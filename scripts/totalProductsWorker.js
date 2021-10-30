let allBarcodes;
window.onload = async function () {
  allBarcodes = await getBarcodes()
}

document.querySelector('#code').addEventListener('input', (e) => {
  document.querySelector('.info').innerHTML = ''
  let isWorkerCode = allBarcodes.workers.find(item => item == document.querySelector('#code').value)
  if(isWorkerCode !== undefined) {
    console.log('Совпало')
    let formData = new FormData()
    formData.append('code', document.querySelector('#code').value)
    sendCode(formData)
  }
})

document.querySelector('#send-code').addEventListener('submit', (e) => {
  e.preventDefault()
  document.querySelector('.info').innerHTML = 'Товар не найден'
})

async function sendCode(a) {
  const res = fetch('../php/totalProductsWorker.php', {
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
  console.log(result.list)
  if(result.list){
    document.querySelector('.main-wrapper').innerHTML = `<h1>На сотрудника <span class="text-primary">${result.fio}</span> выдано:</h1>
    <ul>
      <li>${result.list}</li>
    </ul>`
  }else {
    document.querySelector('.main-wrapper').innerHTML = `<h1>На сотрудника <span class="text-primary">${result.fio}</span> ничего не выдано</h1>`
  }
}