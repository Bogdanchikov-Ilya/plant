document.querySelector('button').addEventListener('click', (e) => {
  let scanner = new Instascan.Scanner({  video: document.getElementById('preview'), scanPeriod: 5, mirror: true });
  Instascan.Camera.getCameras().then(function (cameras){
    document.querySelector('.array').innerHTML = cameras.length
    if(cameras.length > 0) {
      scanner.camera = cameras[0];
      scanner.start();
    } else{
      alert('Камера не найдена')
    }
  }).catch(function (e) {
    console.log(e)
  })

  scanner.addListener('scan', function (c){
    document.getElementById('code').value=c
  })
})