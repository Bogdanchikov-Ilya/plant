let codeValue = document.querySelector('#barcode')

codeValue.addEventListener('input', (e) => {
  if(codeValue.value.length >= 12) {
    document.querySelector('.codeimg').style.display = 'block'
    codeValue.value = codeValue.value.slice(0, 12)
    JsBarcode("#ean-13", codeValue.value, {format: "ean13"});
  }else if (codeValue.value.length < 12) {
    console.log(codeValue.value)
    JsBarcode("#ean-13", codeValue.value + '0'.repeat(12 - codeValue.value.length), {format: "ean13"});

  }
})

codeValue.addEventListener('blur', (e) => {
  codeValue.value = codeValue.value + '0'.repeat(12 - codeValue.value.length)
})