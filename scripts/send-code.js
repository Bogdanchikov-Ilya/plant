let allBarcodes;
document.addEventListener("DOMContentLoaded", async function() {
  allBarcodes = await getBarcodes()
});

document.querySelector('#code').addEventListener('input', (e) => {
  document.querySelector('.info').innerHTML = ''
  if(document.querySelector('form').classList.contains('worker-code') == true){
    let isWorkerCode = allBarcodes.workers.find(item => item == document.querySelector('#code').value)
    console.log(isWorkerCode)
    if(isWorkerCode !== undefined) {
      document.querySelector('#code').setAttribute("disabled", "disabled");
      document.querySelector('.loader__wrapper').style.display = 'flex'
      let formData = new FormData()
      localStorage.setItem('worker-code', document.querySelector('#code').value)
      formData.append('worker-code', localStorage.getItem('worker-code'))
      sendCode(formData)
    }
  }else if (document.querySelector('form').classList.contains('product-code') == true) {
    let isProductCode = allBarcodes.products.find(item => item == document.querySelector('#code').value)
    console.log(isProductCode)
    if(isProductCode !== undefined) {
      document.querySelector('#code').setAttribute("disabled", "disabled");
      document.querySelector('.loader__wrapper').style.display = 'flex'
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
  if(document.querySelector('form').classList.contains('worker-code') == true){
    document.querySelector('.info').innerHTML = 'Сотрудник не найден'
  } else if (document.querySelector('form').classList.contains('product-code') == true) {
    document.querySelector('.info').innerHTML = 'Товар не найден'
  }
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
  if(result.res.status !== true) {
    document.querySelector('.main-wrapper').innerHTML = `<h1>${result.res.resText}</h1>`
  }
  if(result.res.action == 'takeProduct'){
    document.querySelector('.main-wrapper').innerHTML = `<h1> Cотрудник <span class="text-primary">${result.res.worker}</span> взял оборудование - <span class="text-primary">«${result.res.product}»</span></h1>`
  } else if (result.res.action == 'returnProduct') {
    document.querySelector('.main-wrapper').innerHTML = `<h1> Cотрудник <span class="text-primary">${result.res.worker}</span> вернул на склад - <span class="text-primary">«${result.res.product}»</span></h1>`
  }
}