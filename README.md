# Projek Perangkat Lunak
Bismillah Dimudahkan matkul PPLnya

1. Clone reposity ini dengan code
<pre>
  git clone https://github.com/hfzdzakii/pplWebForum.git
</pre>
2. Masuk ke dalam folder dengan command :
<pre>
  cd pplWebForum
</pre>
3. Buka VSCode dengan command :
<pre>
  code .
</pre>
4. Bikin file baru dengan nama <strong>connectDb.php</strong> dan paste code :
    Pokoke sesuaike ae karo settingan XAMPP mu
<pre>
    $host = 'localhost';
    $dbname = 'webforumppl';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
</pre>
5. SQL gawe bareng sek
6. Next~~
