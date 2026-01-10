-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 02:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comimakeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `slikaAutorID` int(10) NOT NULL,
  `naslov` varchar(20) NOT NULL,
  `tekst` varchar(800) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`slikaAutorID`, `naslov`, `tekst`) VALUES
(10, 'O autoru', 'Ja sam Milica Pavlović (broj indeksa 73/17). Dolazim iz Beograda, studentkinja sam druge godine Visoke ICT škole koju sam upisala nakon završene Trinaeste beogradske gimnazije.Dinamički sajt Comi Makeup predstavlja moju realizaciju jedne od predispitnih obaveza na fakultetu iz predmeta Praktikum Web programiranje PHP.\r\nNameravam da ovim sajtom napravim korak napred u karijeri programera i ujedno prikažem drugima moju ljubav prema šminci i iskustvo u šminkanju svih onih koje sam privukla svojim talentom.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `korisnickoIme` varchar(23) NOT NULL,
  `korisnikMalaSlikaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `email`, `pass`, `admin`, `korisnickoIme`, `korisnikMalaSlikaId`) VALUES
(1, 'comicar@gmail.com', '568435a2c1f2dbe3ea1bffaaef328b5b', 1, 'comikoma', 2),
(2, 'glupko@gmail.com', '224c85eabdc8afa332ba729cf90c8bf0', 0, 'glupko', 1),
(4, 'milicap1598@gmail.com', '568435a2c1f2dbe3ea1bffaaef328b5b', 0, 'comi', 3),
(6, 'danijela@gmail.com', '4c971de594c3d82dbb2c3a4e7855fc16', 0, 'daca', 1),
(7, 'danijeladmin@gmail.com', '8058bf6fc19582906f0032b83e6db55b', 1, 'dacadmin', 2),
(8, 'milos@gmail.com', 'b82753180960205a4a62feff9c0f93f5', 0, 'DjomlaBrat', 1),
(9, 'sanja@gmail.com', '674033583816e73167b0ca098ca0c65a', 0, 'sanja', 1),
(10, 'milos2@gmail.com', '36e5d09d421d64bb95783c92b8cc30ad', 0, 'milos2', 1),
(11, 'bombonica@gmail.com', 'fe41048a05c2af36581f787a73f6df75', 0, 'bombon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnickeslike`
--

CREATE TABLE `korisnickeslike` (
  `idKorSlike` int(11) NOT NULL,
  `hrefKorSlike` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnickeslike`
--

INSERT INTO `korisnickeslike` (`idKorSlike`, `hrefKorSlike`) VALUES
(1, 'assets/img/korisnici/sc3.jpg'),
(2, 'assets/img/korisnici/admin.jpg'),
(3, 'assets/img/korisnici/s8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `navigacija`
--

CREATE TABLE `navigacija` (
  `idLinka` int(11) NOT NULL,
  `nazivLinka` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hrefLinka` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navigacija`
--

INSERT INTO `navigacija` (`idLinka`, `nazivLinka`, `hrefLinka`, `admin`) VALUES
(1, 'Početna', 'pocetna', 0),
(2, 'Blog', 'blog', 0),
(3, 'O autoru', 'autor', 0),
(4, 'Admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `postovi`
--

CREATE TABLE `postovi` (
  `idPosta` int(11) NOT NULL,
  `naslovPosta` varchar(100) NOT NULL,
  `tekstPosta` varchar(1200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slikaPostaID` int(11) NOT NULL,
  `datPosta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postovi`
--

INSERT INTO `postovi` (`idPosta`, `naslovPosta`, `tekstPosta`, `slikaPostaID`, `datPosta`) VALUES
(1, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 4, '2019-06-01'),
(2, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 5, '2019-06-02'),
(3, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 6, '2019-06-03'),
(4, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 7, '2019-06-04'),
(5, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 8, '2019-06-03'),
(6, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 9, '2019-06-04'),
(9, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 12, '2019-05-15'),
(10, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 13, '2019-06-06'),
(11, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 11, '2019-06-09'),
(12, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 14, '2019-06-07'),
(13, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 15, '2019-05-20'),
(14, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 16, '2019-06-09'),
(15, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 17, '2019-05-16'),
(16, 'Njegovanje lica', 'Prvo i osnovno – njega koze lica! To je podloga na kojoj cete pokazivati svoje umjece sminkanja. Koza mora biti njegovana i zdrava, morate znati odrediti kojem tipu koze pripada vasa koza lica da biste prema tom tipu odredili vrstu preparata koje cete koristiti. Ja sam npr. dugo trazila kreme koje ce mi u potpunosti odgovarati, i nasla sam napokon. Ali, ako meni ta krema odgovara, ne znaci da mora i vama. Nikad se ne povodite za onim sto je na tudjoj kozi super. Jer na vasoj ne mora biti. Tip koze je vrlo individualna stvar.\r\n\r\nOvdje bih jos nesto rekla, ne morate kupovati skupe kreme da bi koza izgledala njegovano i zdravo. Naravno, ako imate mogucnost za kupovinu skupih i kvalitetnih preparata, to cete i uciniti. (To je stvar licnog izbora i mogucnosti.) Ali, nije samo cijena garant kvalitete. Bitno je da svoje lice pazite i njegujete na dnevnoj bazi, jer koza ne trpi oscilacije tipa: danas cu ocistiti lice tonikom, pa onda dva dana necu. To ni slucajno.\r\n\r\nKako treba njegovati lice, isto tako treba njegovati i kozu vrata i dekoltea. Mnogima to izgleda kao “malo previse”, pa kazu “ma zasto vrat” i sl., ali dok ste mladi naravno cini vam se da nema potrebe za tim, ali u kasnijim g', 18, '2019-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `idSlike` int(11) NOT NULL,
  `hrefSlike` varchar(256) NOT NULL,
  `altSlike` varchar(40) NOT NULL,
  `malaSlikaHref` varchar(256) NOT NULL,
  `sivaSlikaHref` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`idSlike`, `hrefSlike`, `altSlike`, `malaSlikaHref`, `sivaSlikaHref`) VALUES
(1, 'assets/img/1.jpg', 'slajder1', '', ''),
(2, 'assets/img/2.jpg', 'slajder2', '', ''),
(3, 'assets/img/3.jpg', 'slajder3', '', ''),
(4, 'assets/img/t.jpg', 'thumbnail1', '', ''),
(5, 'assets/img/t2.jpg', 'thumbnail2', '', ''),
(6, 'assets/img/t3.jpg', 'thumbnail3', '', ''),
(7, 'assets/img/t4.jpg', 'thumbnail4', '', ''),
(8, 'assets/img/m.jpg', 'sminka', '', ''),
(9, 'assets/img/fenty2.jpg', 'fentyProizvodi', '', ''),
(10, 'assets/img/autor3.jpg', 'autor3', '', ''),
(11, 'assets/img/s1.jpg', 'sminka1', '', ''),
(12, 'assets/img/s2.jpg', 'sminka2', '', ''),
(13, 'assets/img/s3.jpg', 'sminka3', '', ''),
(14, 'assets/img/s4.jpg', 'sminka4', '', ''),
(15, 'assets/img/s5.jpg', 'sminka5', '', ''),
(16, 'assets/img/s6.jpg', 'sminka6', '', ''),
(17, 'assets/img/s7.jpg', 'sminka7', '', ''),
(18, 'assets/img/fenty3.png', 'fenty3', '', ''),
(19, 'assets/img/fenty4.img', 'fenty4', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD UNIQUE KEY `slikaAutorID` (`slikaAutorID`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`),
  ADD KEY `id` (`id`),
  ADD KEY `korisnikMalaSlikaId` (`korisnikMalaSlikaId`);

--
-- Indexes for table `korisnickeslike`
--
ALTER TABLE `korisnickeslike`
  ADD PRIMARY KEY (`idKorSlike`);

--
-- Indexes for table `navigacija`
--
ALTER TABLE `navigacija`
  ADD PRIMARY KEY (`idLinka`);

--
-- Indexes for table `postovi`
--
ALTER TABLE `postovi`
  ADD PRIMARY KEY (`idPosta`),
  ADD KEY `slikaPostaID` (`slikaPostaID`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`idSlike`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `korisnickeslike`
--
ALTER TABLE `korisnickeslike`
  MODIFY `idKorSlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `navigacija`
--
ALTER TABLE `navigacija`
  MODIFY `idLinka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `postovi`
--
ALTER TABLE `postovi`
  MODIFY `idPosta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `idSlike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`korisnikMalaSlikaId`) REFERENCES `korisnickeslike` (`idKorSlike`);

--
-- Constraints for table `postovi`
--
ALTER TABLE `postovi`
  ADD CONSTRAINT `postovi_ibfk_1` FOREIGN KEY (`slikaPostaID`) REFERENCES `slike` (`idSlike`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
