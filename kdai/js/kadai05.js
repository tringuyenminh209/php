
const doc = document;
const uploadImage = doc.querySelector( "#inputFile" );

uploadImage.onchange = (target) => {

    const elem = target.currentTarget;
    const thumbImage = doc.querySelector( "#pic img" );
    const imageArea = doc.querySelector( "#pic" );
    let files = elem.files[ elem.files.length -1 ];
    let reader = new FileReader();
    reader.readAsDataURL(files);

    reader.onload = (target) => {
      let base64Img = target.target.result;
      imageArea.classList.add('d-inline-block','me-1','mt-1','mb-5');
      thumbImage.classList.add('img-thumbnail', 'col-auto');
      thumbImage.style.height = "100px";
      thumbImage.setAttribute( "src", base64Img );      
  }
}