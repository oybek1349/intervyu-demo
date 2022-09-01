<p align="center">
    <a href="#" target="_blank">
        <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/Tanlov-demo-home.JPG" height="500px">
    </a>
    <h1 align="center">Tanlov uchun nomzodlar arizasini qabul qilish demo dasturi</h1>
    <br>
</p>

Ushbu dastur Yii 2 frimevorkda ishab chiqilgan dasturni o'rnatish uchun
<b>arxiv</b> faylni yuklab oling va veb serverga joylashtiring.
<h3>Dasturni ishga tushurish:</h3>
Dasturni ishga tushurish uchun quyidagi sozlamalarni amalga oshiring: 
<ul>
    <li> Serverda MySQL ma'lumotlar oborini yarating.</li>
    <li> config papkasida joylashgan db.php faylga kirib ma'lumotlar omboridan foydalanish sozlamalarini o'rnating misol uchun:
      <pre>
          return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=asaxiy',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix' => 'as_',
        ];
        </pre>    
    </li>
    <li> Ma'lumotlar omborida dastur uchun kerakli bo'ladigan jadvallarni hosil qilish uchun,
        Server buyruq yozish oynasiga kirib quyidagi buyruqni ya'ni migratsiya buyrug'ini kiriting:
        <pre> >> yii migrate-i </pre>
    </li>
    <li> </li>
    <li> </li>
    <li> </li>
</ul>

