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
  <style>

.input-page{
  position: relative;
  top: 0;
}
.add-more-files{
  width: 50vw;
  border-radius: 0.3rem;
  padding: 3rem;
  margin:5rem auto;
  text-align: center;
  background: rgba(230, 230, 250, 0.13);
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.inp-container{
  cursor: pointer;
  position: relative;
  box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(124, 124, 145, 0.1) 0px 16px 48px;
  height: 15rem;
  background: rgba(154, 127, 228, 0.068);
  width: 15rem;
  border-radius: 50%;
  border: 1px dashed rgb(195, 193, 193);
  margin: auto;
  border-width: 0.15rem;
}
#upload-file{
  opacity: 0;
  display: block;
  height: 16rem;
  width: 100%;
  position: absolute;
  cursor: pointer;
}
.img-icon{
  color:  rgba(128, 144, 238, 0.596);
}
#custom-file{
  color: rgb(96, 102, 155);
  position: relative;
  top: 0.5rem;
  padding: 0.5rem 0.8rem;
  font-size: 1.1rem;
  border-radius: 0.2rem;
  font-weight: 600;
}

span{
  font-size: 1.45rem;
}
.drop{
  margin-top: 3rem;
  font-size: 1rem;
  color: rgb(108, 107, 175);
}

.pdf-page{
  z-index:-1;
  min-height: 90%;
  width:100%;
  display: none;
  overflow: hidden;
}
.create-pdf{
  position: relative;
  padding: 1rem;
  margin: auto;
}
.file-item{
  margin-top: 2rem;
  padding: 0 1rem;
  background: none;
  text-align: center;
  position: relative;
  width: 10rem;
  height: 16rem; 
  text-align: center;
  margin: 1rem;
  display: inline-block;
  transition: 0.3s all ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.img-container{   
  width: 8.5rem;
  margin: auto;
  height: 11rem;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
#img{
  position: relative;
  max-width: 9rem;
  max-height: 11rem;
  background: white;
  overflow: hidden;
  box-sizing: border-box;
  border: 0.1rem solid rgb(223, 222, 222);
}
.file-item button{
  background: none;
  border: none;
  outline: none;
  font-size: 1.2rem;
  transition: 0.3s all ease-in-out;
  opacity: 0;
  padding: 0.3rem 0.5rem;

}
.file-item button:hover{
  background: rgb(224, 248, 251);
}
.file-item:hover button{
  opacity: 1;
}
.delete{
  pointer-events: none;
}
#img-name{
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  width: 8.5rem;
  text-align: center;
  margin: 1rem auto;
}

.add-more-file{
    padding: 0 1rem;
    background: none;
    text-align: center;
    position: relative;
    margin: 0.5rem;
    display: inline-block;
    transition: 0.3s all ease-in-out;   
    width: 10rem;
    height: 16rem; 
    vertical-align: top;
}
 .inp-cont{
  display: flex;
  flex-direction: column;
  flex-flow: column-reverse;
  border-radius: 50%;
  position: relative;
  text-align: center;
  border: none;
  background: rgb(241, 246, 246); 
  width: 9rem;
  height: 9rem;
  margin: 3rem auto;
}
#inp{
  opacity: 0;
  display: block;
  width: 9rem;
  height: 9rem;
  border-radius: 50%;
  position: absolute;
  cursor: pointer;
}

.create-pdf .add-more-file p{
  position: relative;
  top: -3.5rem;
}
  </style>
</head>
<?php 
 include('google_api.php');
include 'student_dashboard_header.php' ;
?>
<body>
<section class="px-2 py-32 md:px-0">

<!-- Section 5 --> 

<section class="w-full   pb-7 md:pt-2 md:pb-24 flex justify-center">
<a type="button" href="course_selected.php?gstype1=type1" class="shadow-lg text-red-900 border-2   bg-none hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
GS Questions
</a>
<a type="button" href="course_selected.php" class="shadow-lg text-red-900 border-2  bg-none hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
Optional
</a>
<a type="button" href="course_selected.php" class="shadow-lg text-red-900 border-2  bg-none hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
Optional
</a>
<a type="button" href="course_selected.php" class="shadow-lg text-red-900 border-2  bg-none hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
Optional
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