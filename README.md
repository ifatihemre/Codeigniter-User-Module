# CodeIgniter User Module

- Veritabanı şeması, schema.sql olarak eklendi.
- admin@demo.com kullanıcı adı için şifre admin
- user@demo.com kullanıcı adı için şifre demo

# Özellikleri

- Libraries içerisine koyulan UserModule class ile, user işlemleri tek bir noktaya toplandı.

<code>
$this->usermodule->login($email, $password); // return type boolean
</code>
- Yukarıdaki gibi bir kullanım ile kullanıcı girişi yapılabilir.

<code>
$this->usermodule->logout(); // return type void
</code>
- Yukarıdaki gibi bir kullanım ile kullanıcı çıkışı yapılabilir.

<code>
$this->usermodule->create($name, $email, $password, $role); // return type boolean
</code>
- Yukarıdaki gibi bir kullanım ile kullanıcı kaydı yapılabilir.

<code>
$this->usermodule->auth(); // return type boolean
</code>
- Yukarıdaki gibi bir kullanım ile kullanıcı giriş yaptı mı diye kontrol edilebilir.

- Diğer metotlar duruşu temsil etmek için eklendi, içleri doldurulmadı.