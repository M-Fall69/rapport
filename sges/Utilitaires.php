password_hash(string $password, string|int|null $algo, array $options = []): string
    

<?php
// register.php
$pepper = getConfigVariable("pepper");
$pwd = $_POST['password'];
$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
add_user_to_database($username, $pwd_hashed);
?>

<?php
// login.php
$pepper = getConfigVariable("pepper");
$pwd = $_POST['password'];
$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
$pwd_hashed = get_pwd_from_db($username);
if (password_verify($pwd_peppered, $pwd_hashed)) {
    echo "Password matches.";
}
else {
    echo "Password incorrect.";
}
?>

password_verify(string $password, string $hash): bool


Palette : #137C8B #709CA7   #B8CBD0 #7A90A4 #344D59

#04BBFF #0594D0  #007198 #003C57 #051C24