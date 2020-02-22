<form id="login-form" action="?c=users&a=login" method="post">
  <div>
    <label>Nick</label>
    <input type="text" name="nickname" placeholder="Enter nickname" required>
  </div>
  <div>
    <label for="pwd">Password:</label>
    <input type="password" id="password" name="password" required>
  </div>
  <button class="btn btn-primary">Login</button>
</form>
<script>
  $(document).ready(function(){
    $("#login-form").submit();
  })
</script>
</body>
