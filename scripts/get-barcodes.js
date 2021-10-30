var BarcodesArray
async function getBarcodes() {
  const res = fetch('../php/getAllBarcodes.php', {
    method: 'GET',
  })
    .then((res) => {
      return res.json()
    })
    .then((json) => {

      return json
    })
  BarcodesArray = await res
  console.log(BarcodesArray)
  return BarcodesArray
}