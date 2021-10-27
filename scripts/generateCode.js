let codeValue = document.querySelector('#barcode')

document.querySelector('#barcode').addEventListener('input', (e) => {
  if(document.querySelector('#barcode').value == ''){
    document.querySelector('.codeimg').style.display = 'none'
  }else {
    document.querySelector('.codeimg').style.display = 'block'
  }
  JsBarcode("#code128", codeValue.value);
})