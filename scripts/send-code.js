let allBarcodes;
window.onload = async function () {
  allBarcodes = await getBarcodes()
}

document.querySelector('#code').addEventListener('input', (e) => {
  // document.querySelector('#send-code').preventDefault()
  if(document.querySelector('form').classList.contains('worker-code') == true){
    let isWorkerCode = allBarcodes.workers.find(item => item == document.querySelector('#code').value)
    console.log(isWorkerCode)
    if(isWorkerCode !== undefined) {
      let formData = new FormData()
      // document.querySelector('#send-code').submit()
      localStorage.setItem('worker-code', document.querySelector('#code').value)
      formData.append('worker-code', localStorage.getItem('worker-code'))
      sendCode(formData)
    }
  }else if (document.querySelector('form').classList.contains('product-code') == true) {
    let isProductCode = allBarcodes.products.find(item => item == document.querySelector('#code').value)
    console.log(isProductCode)
    if(isProductCode !== undefined) {
      let formData = new FormData()
      // document.querySelector('#send-code').submit()
      console.log('product-code')
      formData.append('action', localStorage.getItem('action'))
      console.log(localStorage.getItem('action'))
      formData.append('worker-code', localStorage.getItem('worker-code'))
      formData.append('product-code', document.querySelector('#code').value)
      localStorage.clear()
      sendCode(formData)
    }
  }
})

document.querySelector('#send-code').addEventListener('submit', (e) => {
  e.preventDefault()
  // document.querySelector('.loader__wrapper').style.display = 'flex'
  // let formData = new FormData()
  // if(document.querySelector('form').classList.contains('worker-code') == true){
  //   console.log('worker-code')
  //   localStorage.setItem('worker-code', document.querySelector('#code').value)
  //   formData.append('worker-code', localStorage.getItem('worker-code'))
  //   sendCode(formData)
  // } else if (document.querySelector('form').classList.contains('product-code') == true) {
  //   console.log('product-code')
  //   formData.append('action', localStorage.getItem('action'))
  //   console.log(localStorage.getItem('action'))
  //   formData.append('worker-code', localStorage.getItem('worker-code'))
  //   formData.append('product-code', document.querySelector('#code').value)
  //   localStorage.clear()
  //   sendCode(formData)
  // }
})

async function sendCode(a) {
  const res = fetch('../php/scan-code.php', {
    method: 'POST',
    body: a
  })
    .then((res) => {
      return res.json()
    })
    .then((json) => {
      document.querySelector('.loader__wrapper').style.display = 'none'
      document.querySelector('input').value = ''
      return json
    })
  let result = await res
  if(result.productCode == undefined) {
    console.log('Переход на сканирование продукта')
    console.log(window.location.origin)
    location.href = window.location.origin + '/read-product.html';
  } else {
    console.log('Переход в БД')
    console.log(allBarcodes)
  }
  console.log(result)
  document.querySelector('.main-wrapper').innerHTML = `<h1 center>${result.res.resText}</h1>`
}