<form action="/admin/admin_players.php" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-12">
      <label >Esportazione FMRTE</label>
      <small>
        (Colonne separate da TAB)
      </small>
      <textarea name="players" id="players" class="form-control" rows="10" required></textarea>
    </div>
    
    <div class="form-group col-12">
      <label for="inputPassword">Password</label>
      <input type="password" class="form-control" id="inputPassword" name="token" placeholder="Password" required="">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Aggiorna</button>
</form>