-- Membuat database hanya jika belum ada
CREATE DATABASE IF NOT EXISTS sistem_sekolah;

-- Menggunakan database tersebut
USE sistem_sekolah;

-- Membuat tabel hanya jika belum ada
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nis VARCHAR(20) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    class VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL UNIQUE
);

insert into students(name, nis, class, phone_number) values (
'Andi', '1234', '11 TKJ 1', '0812345678'
);

insert into students(name, nis, class, phone_number) values (
'Budi', '1235', '11 TKJ 1', '0812345671'
);x

insert into students(name, nis, class, phone_number) values (
'Sudi', '1237', '11 TKJ 1', '0822345671'
);