phptag
======
อัพเดท php tags จาก <b>&lt;?</b> เป็น <b>&lt;?php</b>

<b>!!! อย่าลืม !!!</b> BACKUP ข้อมูลก่อนรันสคริปนี้
```php
$phptag = new MyFile( 'path_to_your_folder' );
$phptag->updateFiles();
```
รองรับ tags ที่ผิดพลาดดังนี้

* &lt;?Test
* &lt;? Test
* &lt;?
* &lt;?
* &lt;?if()
* &lt;?Blog
