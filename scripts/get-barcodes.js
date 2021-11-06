var BarcodesArray
async function getBarcodes() {
  document.querySelector('.loader__wrapper').style.display = 'flex'
  console.log('test')
  const res = fetch('../php/getAllBarcodes.php', {
    method: 'GET',
  })
    .then((res) => {
      return res.json()
    })
    .then((json) => {
      document.querySelector('.loader__wrapper').style.display = 'none'
      return json
    })
  BarcodesArray = await res
  console.log(BarcodesArray)
  return BarcodesArray
}