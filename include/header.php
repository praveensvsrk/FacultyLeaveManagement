<header style="color:#fff; background-color:#004d89;" class="fl-card-8 fl-container fl-center">
  <h1 class="" id="header" style="padding-right: 50px;">Faculty Leave Tracking System</h1>

  <img src="images/avatar3.png" onclick="toggleVisible();" class="fl-circle fl-ripple fl-display-topright fl-margin-right" alt="avatar3" style="margin-top:10px; width:60px" />
</header>

<div id='profilecard' class="fl-display-topright fl-animate-opacity" style="z-index: 5; font-size:15px; margin-right:32px; margin-top:80px; display:none; float:right">

  <img src="images/arrow.png" onclick="this.style.opacity:0.5;" style="float:right; width:24px;" />
  <div class="fl-card-8 fl-white" style="line-height:1; margin-top:10px; height:auto; width:auto">

    <table class="fl-table" style="border-collapse:initial; border-spacing:0px; width:100%; height=100%;">

      <tr class="fl-hide-small">
        <td class='fl-center' style="padding:16px 40px 16px 40px">
          <img src='images/avatar3.png' class="fl-circle" style='width:80px' />
        </td>
        <td class='fl-center' style="padding:8px 40px 8px 40px">
          <p>
            <?php echo "Hello, ".$_SESSION["name"]."!"; ?>
          </p>
        </td>
      </tr>

      <tr class="fl-hide-medium fl-hide-large">
        <td class='fl-center' style="padding:16px 40px 16px 40px">
          <img src='images/avatar3.png' class="fl-circle" style='width:80px' />
        </td>
      </tr>

      <tr class="fl-hide-medium fl-hide-large">
        <td class='fl-center' style="padding:8px 40px 8px 40px">
          <p>
            <?php echo "Hello, ".$_SESSION["name"]."!"; ?>
          </p>
        </td>
      </tr>

      <tr class="fl-hide-small">
        <td class="fl-center fl-light-gray" style='padding:10px 0px 10px 0px'>
          <a href="#" style='border:2px; background-color:#002745' class='fl-ripple fl-btn fl-round fl-hover-red mybutton'>
                Settings
          </a>
        </td>
        <td class="fl-center fl-light-gray" style='padding:10px 0px 10px 0px'>
          <a href="logout.php" style='background-color:#002745' class='fl-ripple fl-btn fl-round fl-hover-red mybutton'>
                Signout
              </a>
        </td>
      </tr>

      <tr class="fl-hide-medium fl-hide-large">
        <td class="fl-center fl-light-gray" style='padding:10px 0px 10px 0px'>
          <a href="#" class="fl-ripple fl-left" style="padding-left:20px">
            <img src='images/Settings-128.png' class="fl-circle" style='width:30px' />
          </a>
          <a href="login.html" class="fl-ripple fl-right" style="padding-right:20px">
            <img src='images/mono-logout.png' class="fl-circle" style='width:30px' />
          </a>
        </td>
      </tr>

    </table>

  </div>
</div>
<script>
  function toggleVisible() {
    if (document.getElementById('profilecard').style.display == 'block') {
      document.getElementById('profilecard').style.display = 'none';
    } else {
      document.getElementById('profilecard').style.display = 'block';
    }
  }
</script>