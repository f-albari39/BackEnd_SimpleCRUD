<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regist Page</title>
</head>
<body>
  <form action="Regist.php" method="post" onsubmit="return validation()" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Name</td>
        <td><input type="text" name="name" id="name"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email" id="email"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td>Retype Password</td>
        <td><input type="password" name="retypePassword" id="retypePassword"></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><input type="radio" name="gender" id="male" value="Male">Male
        <input type="radio" name="gender" id="female" value="Female">Female</td>
      </tr>
      <tr>
        <td>Date of Birth</td>
        <td><input type="date" name="date" id="date"></td>
      </tr>
      <tr>
        <td>Photo</td>
        <td><input type="file" name="photo" id="photo"></td>
      </tr>
      <tr>
        <td><button type="submit">Register</button>
        <button type="button" onclick="back()">Back</button></td>
      </tr>
    </table>
  </form>
  <script>
    function back(){
      window.location.replace('LoginPage.php');
    }

    function validation(){
      if(!emptyCheck()){
        alert("All field must be filled!");
        return false;
      }
      if(!passwordCheck()){
        alert("Retype Password is Incorrect!");
        return false;
      }
      if(!photoCheck()){
        alert("Photo type must be JPG / PNG with size less than 2MB");
        return false;
      }
      return true;
    }

    function emptyCheck(){
      let name = document.getElementById("name").value;
      let email = document.getElementById("email").value;
      let password = document.getElementById("password").value;
      let repassword = document.getElementById("retypePassword").value;
      let dob = document.getElementById("date").value;

      let male = document.getElementById("male").checked;
      let female = document.getElementById("female").checked;

      if(!name || !email || !password || !repassword || !dob) return false;
      if(!male && !female) return false;
      return true;
    }

    function passwordCheck(){
      let password = document.getElementById("password").value;
      let repassword = document.getElementById("retypePassword").value;
      if(password != repassword) return false;
      return true;
    }

    // validasiFoto
    function photoCheck(){
      let photo = document.getElementById("photo");
      // cek maksumal foto 2MB
      if(photo.size > 2048000) return false;
      photo = photo.value;
      photo = photo.substring(photo.length - 4, photo.length);
      if(photo != ".png" && photo != ".jpg"){
        return false;
      }else{
        return true;
      }
    }
  </script>
</body>
</html>