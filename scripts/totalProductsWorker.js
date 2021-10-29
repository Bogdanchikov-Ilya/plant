document.querySelector('#send-code').addEventListener('submit', (e) => {
  e.preventDefault()
  document.querySelector('.loader__wrapper').style.display = 'flex'
  let formData = new FormData()
  formData.append('code', document.querySelector('#code').value)

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
    console.log(result)
    document.querySelector('.main-wrapper').innerHTML = `<h1 center>${result.resText}</h1>`
  }
  sendCode(formData)
})