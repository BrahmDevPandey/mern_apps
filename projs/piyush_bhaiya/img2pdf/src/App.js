import React, { useState, ChangeEventHandler } from "react";
import jsPDF from "jspdf";
import { useEffect } from "react";
import $ from "jquery";
import { ClipLoader } from "react-spinners";

// New class with additional fields for Image
class CustomImage extends Image {
  constructor(mimeType) {
    super();
    this.mimeType = mimeType;
  }

  // `imageType` is a required input for generating a PDF for an image.
  get imageType() {
    return this.mimeType.split("/")[1];
  }
}

const App = () => {
  //defining required functions
  // Each image is loaded and an object URL is created.
  const fileToImageURL = (file) => {
    return new Promise((resolve, reject) => {
      if (file.type === "application/pdf") {
        const blob = new Blob([file], { type: "application/pdf;" });
        const url = window.URL.createObjectURL(blob);
        savePdfToServer(url);
      }

      const image = new CustomImage(file.type);

      image.onload = () => {
        resolve(image);
      };

      image.onerror = () => {
        reject(new Error("Failed to convert File to Image"));
      };

      image.src = URL.createObjectURL(file);
    });
  };

  // The dimensions are in millimeters.
  const A4_PAPER_DIMENSIONS = {
    width: 210,
    height: 297,
  };

  const A4_PAPER_RATIO = A4_PAPER_DIMENSIONS.width / A4_PAPER_DIMENSIONS.height;

  const dimensions = {
    width: 0,
    height: 0,
  };

  // Calculates the best possible position of an image on the A4 paper format,
  // so that the maximal area of A4 is used and the image ratio is preserved.
  const imageDimensionsOnA4 = (dimensions) => {
    const isLandscapeImage = dimensions.width >= dimensions.height;

    // If the image is in landscape, the full width of A4 is used.
    if (isLandscapeImage) {
      return {
        width: A4_PAPER_DIMENSIONS.width,
        height:
          A4_PAPER_DIMENSIONS.width / (dimensions.width / dimensions.height),
      };
    }

    // If the image is in portrait and the full height of A4 would skew
    // the image ratio, we scale the image dimensions.
    const imageRatio = dimensions.width / dimensions.height;
    if (imageRatio > A4_PAPER_RATIO) {
      const imageScaleFactor =
        (A4_PAPER_RATIO * dimensions.height) / dimensions.width;

      const scaledImageHeight = A4_PAPER_DIMENSIONS.height * imageScaleFactor;

      return {
        height: scaledImageHeight,
        width: scaledImageHeight * imageRatio,
      };
    }

    // The full height of A4 can be used without skewing the image ratio.
    return {
      width:
        A4_PAPER_DIMENSIONS.height / (dimensions.height / dimensions.width),
      height: A4_PAPER_DIMENSIONS.height,
    };
  };

  // Creates a PDF document containing all the uploaded images.
  const generatePdfFromImages = (images) => {
    // Default export is A4 paper, portrait, using millimeters for units.
    const doc = new jsPDF();

    // We let the images add all pages,
    // therefore the first default page can be removed.
    doc.deletePage(1);

    images.forEach((image) => {
      const imageDimensions = imageDimensionsOnA4({
        width: image.width,
        height: image.height,
      });

      if (image.imageType === "svg+xml") {
        alert("svg files not supported.");
      } else {
        doc.addPage();
        doc.addImage(
          image.src,
          // Images are vertically and horizontally centered on the page.
          (A4_PAPER_DIMENSIONS.width - imageDimensions.width) / 2,
          (A4_PAPER_DIMENSIONS.height - imageDimensions.height) / 2,
          imageDimensions.width,
          imageDimensions.height
        );
      }
    });

    // Creates a PDF and opens it in a new browser tab.
    setLoading(true);
    const pdfURL = doc.output("bloburl");
    savePdfToServer(pdfURL);
  };

  var pdfSavingDone = false;

  const savePdfToServer = (pdfURL) => {
    if (pdfSavingDone) return;
    pdfSavingDone = true;
    var xhr = new XMLHttpRequest();
    xhr.responseType = "blob";

    xhr.onload = function () {
      var recoveredBlob = xhr.response;

      var reader = new FileReader();

      reader.onload = function () {
        var blobAsDataUrl = reader.result;
        blobAsDataUrl = blobAsDataUrl.substring(blobAsDataUrl.indexOf(",") + 1);

        $.ajax({
          type: "POST",
          url: "save.php",
          data: { pdfData: blobAsDataUrl },
          success(data) {
            setLoading(false);
            alert("Pdf saved successfully.");
            window.location = "user_answer.php";
          },
          error(data) {
            setLoading(false);
            alert("Error saving the page. Please retry.");
            window.location = "user_answer.php";
          },
        });
      };
      reader.readAsDataURL(recoveredBlob);
    };

    xhr.open("GET", pdfURL);
    xhr.send();
  };

  // State for uploaded images
  const [uploadedImages, setUploadedImages] = useState([]);
  const [loading, setLoading] = useState(false);
  let fileList = [];
  let fileContainer = null;
  useEffect(() => {
    if (!loading) {
      fileContainer = document.getElementById("file-container");
      // for drag and drop of files
      fileContainer.ondragover = fileContainer.ondragenter = function (event) {
        event.preventDefault();
      };
    }
  });

  const handleDrop = React.useCallback(
    (event) => {
      event.preventDefault();
      fileList = [...fileList, ...event.dataTransfer.files];
      const fileArray = fileList ? Array.from(fileList) : [];

      const fileToImagePromises = fileArray.map(fileToImageURL);
      Promise.all(fileToImagePromises).then(setUploadedImages);
    },
    [setUploadedImages]
  );

  const handleImageUpload = React.useCallback(
    (event) => {
      fileList = [...fileList, ...event.target.files];
      const fileArray = fileList ? Array.from(fileList) : [];

      const fileToImagePromises = fileArray.map(fileToImageURL);
      Promise.all(fileToImagePromises).then(setUploadedImages);
    },
    [setUploadedImages]
  );

  const handleFinalSubmit = () => {
    setLoading(true);
    handleGeneratePdfFromImages();
  };

  const cleanUpUploadedImages = React.useCallback(() => {
    setUploadedImages([]);
    uploadedImages.forEach((image) => {
      URL.revokeObjectURL(image.src);
    });
  }, [setUploadedImages, uploadedImages]);

  const handleGeneratePdfFromImages = React.useCallback(() => {
    generatePdfFromImages(uploadedImages);
    cleanUpUploadedImages();
  }, [uploadedImages, cleanUpUploadedImages]);

  const deleteImage = (src) => {
    const newList = uploadedImages.filter((img) => img.src !== src);
    setUploadedImages(newList);
  };

  return (
    <div className="dark:bg-neutral-800">
      {loading ? (
        <div className="h-[60vh] text-center m-5 flex items-center justify-center dark:bg-neutral-800 dark:text-white">
          <ClipLoader color={"rgb(162 28 175)"} size={200} />
          <div className="text-xl font-bold m-5">Uploading...</div>
        </div>
      ) : (
        <div>
          <div className="flex items-center justify-center">
            <div
              className="flex w-[60%] h-[400px] max-h-[40vh] overflow-x-auto m-5 shadow-2xl bg-gray-100 border-gray-600 border-solid rounded-sm box-border dark:bg-neutral-800 dark:text-white"
              id="file-container"
              onDrop={handleDrop}
            >
              {uploadedImages.length > 0 ? (
                uploadedImages.map((img) => (
                  <div
                    key={img.src}
                    className="flex-shrink-0 text-center mx-2 my-3"
                  >
                    <button onClick={() => deleteImage(img.src)}>
                      <i className="fa fa-trash"></i>
                    </button>
                    <img
                      src={img.src}
                      alt={"Image of " + img.name}
                      className="max-h-[90%] h-[90%] rounded-sm"
                    />
                    <label>{img.name}</label>
                  </div>
                ))
              ) : (
                <div
                  onDrop={handleDrop}
                  className="flex align-center text-center m-auto"
                >
                  <label htmlFor="file-input" className="w-max h-min text-xl">
                    Upload some images...
                  </label>
                </div>
              )}
            </div>
            <div className="m-3 p-2 border-2 rounded border-dashed dark:text-white">
              <label htmlFor="file-input">
                <span className="w-min p-2 py-3 text-lg rounded-md mx-2 my-4">
                  Add Images / Pdf
                  <i className="fa fa-add ml-2"></i>
                </span>
                <input
                  type="file"
                  id="file-input"
                  name="file-input"
                  accept="*"
                  onChange={handleImageUpload}
                  style={{ display: "none" }}
                  multiple
                />
              </label>
            </div>
          </div>
          <div className="text-center my-4">
            <button
              onClick={handleFinalSubmit}
              disabled={uploadedImages.length === 0}
              className="p-2 px-3 text-lg rounded-md bg-[#830e5e] text-white  dark:bg-fuchsia-700 disabled:bg-gray-400 disabled:text-white mx-2 my-4 uppercase"
            >
              Submit
            </button>
          </div>
        </div>
      )}
    </div>
  );
};

export default App;
