<?php 
session_start();
if(!isset($_SESSION['access_token'])){
    header('location:index.php');
}
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <?php
  include 'cdn.php'; 
  ?>
  
</head>
<?php 
 include('google_api.php');
include 'student_dashboard_header.php' ;
?>
<body>
<section class="px-2 py-32 md:px-0">

<!-- Section 5 --> 
<div class="flex justify-center ...">
<div class=" p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Thank You </h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the your uploaded PDF file</p>
    <a href="filename.pdf" download="download" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Download Now
        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>
</div>
<section class="w-full grid gap-4   pb-7 md:pt-2 md:pb-24 flex justify-center">
<a href="evolution.php" type="button" class="shadow-lg text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
</svg>
Upgrade
</a>

</section>

<?php 
if(isset($_GET['gstype1'])){?>
  <div class="input-page mb-5 "  id="input-page">
  <div class="flex  justify-center items-center w-full choose-file">
<label for="dropzone-file" class="flex flex-col mx-auto justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
  <div class="flex flex-col justify-center items-center pt-5 pb-6">
      <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
      <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
      <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
  </div>
  <input type="file" id="upload-file" onChange={encodeImageFileAsURL(this)} multiple accept="image/*"/>
</label>
</div> 
</div>
<?php
}

?>

        <div class="pdf-page" id="pdf-page">             
            <div class="create-pdf" id="create-pdf"> 
            </div>
        </div>
        <div id="btns" class="flex flex-col      cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <button type="button" style="display: none;" onClick={embedImages()} id="convertBtn" convertBtn={convertBtn} class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
  UPLOAD
</button>
        </div>

</section>
</body>
<script >
            var data= [];
var width= 620;
var height= 600;
var pdfName;
var fileName= '';
const createPDF= document.getElementById('create-pdf');
encodeImageFileAsURL= (element)=>{
    document.getElementById('input-page').style.display= 'none';
    document.getElementById('pdf-page').style.display= 'inline-block';
    const length= element.files.length;
    for(var i=0;i<length;i++){
        let file= element.files[i];
        let pdfname= element.files[0];
        let reader= new FileReader();
        reader.readAsDataURL(file);
        let obj= {
            list: reader,
            fileName: file.name,
            time: new Date().toString() + i
        }
        reader.onloadend= ()=>{
            data= [...data,obj];
            pdfName= pdfname.name
        }
    }
    setTimeout(convertToPDF,1000);
    document.getElementById('upload-file').value= null;
    setTimeout(saveAsPDF,1000);
}
saveAsPDF= ()=>{
    
    document.getElementById('convertBtn').style.display= 'inline-block';
}
handleDelete= (e)=>{
    data= data.filter((item)=>item.time!==e.currentTarget.id);
    if(data.length==0){
        location.reload();
    }
    else{
        convertToPDF();
    }
}
embedImages= async ()=>{
    const pdfDoc= await PDFLib.PDFDocument.create();
    for(var i=0;i<data.length;i++){
        const jpgUrl= data[i].list.result;
        console.log(jpgUrl);
        const jpgImageBytes= await fetch(jpgUrl).then((res) => res.arrayBuffer());
        const jpgImage = await pdfDoc.embedJpg(jpgImageBytes);
        const page= pdfDoc.addPage();
        page.setSize(width,height);
        page.drawImage(jpgImage, {
            x: 20,
            y: 50,
            width: page.getWidth()-40,
            height: page.getHeight()-100,
        })
    }
    const pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
    var result = pdfDataUri;
    var finalurl=result.split(',')[1]
     $.ajax({
        type: 'POST',
        url: "save.php",
        data: { pdfData: finalurl},
        dataType: "JSON",
        success: function(resultData) { alert("File Uploaded Successfully") }
  });
    const pdfBytes= await pdfDoc.save();
    // download(pdfBytes, pdfName.slice(0,-4), "application/pdf");
  setTimeout(backToHomepage,1000);
}
function convertToPDF(){
    createPDF.innerHTML= '';
    data.map((item,i)=>{
        const fileItem= document.createElement('div');
        fileItem.setAttribute('class','file-item');
        const modify= document.createElement('div');
        modify.setAttribute('class','modify');
        const button2= document.createElement('button');
        button2.setAttribute('class','delete-btn');
        button2.setAttribute('id',item.time);
        const remove= document.createElement('i');
        remove.setAttribute('class','fa fa-trash');
        button2.appendChild(remove);
        button2.addEventListener('click',(e)=>{
            handleDelete(e);
        });
        modify.appendChild(button2);
        fileItem.appendChild(modify);
        const imgContainer= document.createElement('div');
        imgContainer.setAttribute('class','img-container');
        const img= document.createElement('img');
        img.setAttribute('id','img');
        img.src= item.list.result;
        imgContainer.appendChild(img);
        fileItem.appendChild(imgContainer);
        const imgName= document
        .createElement('p');
        imgName.setAttribute('id','img-name');
        imgName.innerHTML= item.fileName;
        fileItem.appendChild(imgName);
        createPDF.appendChild(fileItem);
    });
    const addMoreFile= document.createElement('div');
    addMoreFile.setAttribute('class','add-more-file');
    const addFile= document.createElement('div');
    addFile.setAttribute('class','inp-cont');
    const input= document.createElement('input');
    input.setAttribute('id','inp');
    input.type= 'file';
    input.multiple= 'true';
    input.onchange= function(){
      var x=  encodeImageFileAsURL(this);
    }
    const p= document.createElement('p');
    const i= document.createElement('i');
    i.setAttribute('class','fa fa-plus');
    p.appendChild(i);
    const label= document.createElement('label');
    label.htmlFor= 'inp';
    label.innerHTML= 'Add Files';
    addFile.appendChild(p);
    addFile.appendChild(label);
    addFile.appendChild(input);
    addMoreFile.appendChild(addFile);
    createPDF.appendChild(addMoreFile);
}
function backToHomepage(){
    location.href="successupload.php";
}
        </script>
</html>