<form action="<?= BASE_URL?>?action=dangki" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="password">
  </div>
  <div class="mb-3">
    <label for="Confirm" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="Confirm" name="confirm">
  </div>
  <div class="flex">
    <samp>Đã có tài khoản</samp>
  <a href="<?= BASE_URL ?>?action=login">Đã có tài khoản-Đăng nhập</a>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>