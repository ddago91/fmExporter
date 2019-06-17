<form action="admin/admin.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="col-md-6">
      <label >File</label>
      <div class="custom-file">
        <input name="players" type="file" class="custom-file-input" id="validatedCustomFile" required>
        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
      </div>
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <input type="password" class="form-control" id="inputPassword" name="token" placeholder="Password" required="">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Aggiorna</button>
</form>