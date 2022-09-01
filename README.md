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
    <li> Agar dasturni o'zingizni yii2 dasturingizga integratsiya qilmoqchi bulsangiz modules papkasida joylashgan intervyu modulini dasturingiz modullari qatoriga qo'shib kerakli sozlamarni o'rnating.                     
    </li>
</ul>

  <h3>Modulni ishga tushurish sozlamasi:</h3>         
<pre>
    'modules' => [
        'intervyu' => [
            'class' => app\modules\intervyu\IntervyuModule::class,
        ],
    ],     
</pre>        
        
 <h3> Modul REST API rejimi uchun REST FULL API ni ishga tushurish sozlamalari: </h3>
        
 <pre> 'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                [ 
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => '/intervyu/api',
                ],
                'GET intervu/api/<id:\d+>' => 'intervyu/api/get',
                'PUT,POST intervu/api/<id:\d+>' => 'intervyu/api/create',
                'PUT,PATCH intervu/api/<id:\d+>' => 'intervyu/api/update',
                "DELETE intervu/api/<id:\d+>" => 'intervyu/api/delete',
            ],
        ],
  </pre>
  
  <h3>Nomzodlar Tanlov uchun ariza yuborish formasi: </h3>
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/frontend-add-nomzod.JPG" height="500px">
  
  <h1> Admin uchun </h1>
  <h3>Admin uchun kirish oynasi. Kirish uchun quyidagilarni kiriting: </h3>
  
  <p>Login: admin</p>
  <p>Parol: admin</p>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/frontend-login.JPG" height="500px">
  
  <h3>Nomzodlar ro'yixati bilan tanishish oynasi. </h3>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/backend-nomzodlar-ruyixati.JPG" height="500px">
  
  <h3>Nomzodlarga intervyu belgilash. </h3>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/backend-nozodlarga-intervyu belgilash.jpg" height="500px">
  
  <h1> REST API admin uchun </h1>
  
  <h3> Barcha nomzodlar ro'yixatini json formatda olish </h3>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/get-rest-api.JPG" height="500px">
  
  <h3> ID yordamida nomzod ma'lumotlarini json formatda olish </h3>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/get-nomzod-id-buyicha.JPG" height="500px">
  
  <h3> Yangi nomzod qo'shish </h3>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/create-rest-api.JPG" height="500px">
 
  <h3> Yuborilgan ID ga mos Nomzod ma'lumotlarini o'zgartirish </h3>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/update-rest-api.JPG" height="500px">
 
  <h3> Yuborilgan ID ga mos Nomzod ma'lumotlarini o'chirish. </h3>
  
  <img src="https://github.com/oybek1349/intervyu-demo/blob/master/images/delete-nomzod-id-buyicha.JPG" height="500px">
  
  <h1>E'tiboringiz uchun raxmat!<h1>
  <h3>Author Oybek Ne'matov Erkin o'g'li</h3>
