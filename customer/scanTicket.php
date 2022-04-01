
<html>
<html>
  <head>
  <style>
.camera {
  background-color: white;
  color: black;
  border: 1px solid black;
  margin: 20px;
  padding: 20px;
  margin-top: 100px;
}
.result {
  background-color: white;
  color: black;
  margin: 20px;
  padding: 20px;
  margin-top: 100px;
}
</style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>
      
    <div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <div class="camera">
            <label>Scannez votre ticket</label>
                <video id="preview" width="100%"></video>           
                    </div>
                    </div>
                <div class="col-md-6">
                <div class="result">
                    <form action="insert.php" method="post" class="form-horizontal">
                    <label>Résultat</label>
                        <input type="text"  name="text" id="text" readonly placeholder="Résultat scan" class="form-control">
                    </form>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
            
            <script>
                let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
                Instascan.Camera.getCameras().then(function(cameras){
                    if(cameras.length > 0){
                        scanner.start(cameras[0]);
                    } else {
                        alert('Caméra non trouvée');
                    }

                }).catch(function(e) {
                    console.error(e);
                });

                scanner.addListener('scan',function(c){
                    document.getElementById('text').value=c;
                    document.forms[0].submit();
                });
            </script>
            
    
  </body>
</html>

