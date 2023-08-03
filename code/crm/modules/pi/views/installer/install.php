<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');

$CI = &get_instance();
//We set the prefix in an variable for to insert into the script
$dbPrefix = db_prefix();

//Load Tables
if(!$CI->db->table_exists("{$dbPrefix}_paises"))
{
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_paises` (
      `pais_id` INT NOT NULL,
      `nombre` VARCHAR(60) NOT NULL,
      PRIMARY KEY (`pais_id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla maestra de paises';
    ");
    //We insert all country 
    $CI->db->query(
      "insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Andorra ', 1);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Emiratos Árabes Unidos ', 2);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Afganistán ', 3);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Antigua y Barbuda ', 4);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Anguila ', 5);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Albania ', 6);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Armenia ', 7);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Antillas Holandesas ', 8);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Angola ', 9);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Antártida ', 10);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Argentina ', 11);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Samoa Americana ', 12);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Austria ', 13);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Australia ', 14);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Aruba ', 15);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Azerbaiyán ', 16);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bosnia y Herzegovina ', 17);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Barbados ', 18);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bangladesh ', 19);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bélgica ', 20);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Burkina Faso ', 21);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bahrein ', 22);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Burundi ', 23);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Benin ', 24);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bermudas ', 25);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bolivia ', 26);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Brasil ', 27);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bahamas ', 28);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bután ', 29);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Isla Bouvet ', 30);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bulgaria ', 31);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Botswana ', 32);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Brunei Darussalam ', 33);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Bielorrusia ', 34);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Belice ', 35);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Canadá ', 36);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Cocos (Keeling) ', 37);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('República Centroafricana ', 38);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Congo ', 39);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Suiza ', 40);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Cote D\'Ivoire (Costa de Marfil) ', 41);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Cook ', 42);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Chile ', 43);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Camerún ', 44);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('China ', 45);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Colombia ', 46);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Costa Rica ', 47);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Cuba ', 48);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Cabo Verde ', 49);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Isla de Navidad ', 50);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Chipre ', 51);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('República Checa ', 52);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Alemania ', 53);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Djibouti ', 54);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Dinamarca ', 55);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Dominica ', 56);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('República Dominicana ', 57);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Argelia ', 58);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Ecuador ', 59);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Estonia ', 60);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Egipto ', 61);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Sáhara Occidental ', 62);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Eritrea ', 63);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('España ', 64);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Etiopía ', 65);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Finlandia ', 66);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Fiji ', 67);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Malvinas (Falkland) ', 68);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Micronesia ', 69);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Feroe ', 70);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Francia ', 71);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Gabón ', 72);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Gran Bretaña (Reino Unido) ', 73);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Granada ', 74);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Georgia ', 75);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guayana Francesa', 76);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Ghana ', 77);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Gibraltar ', 78);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Groenlandia ', 79);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Gambia ', 80);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guinea ', 81);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guadalupe ', 82);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guinea Ecuatorial ', 83);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Grecia ', 84);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Georgia del Sur y Islas Sandwich del Sur ', 85);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guatemala ', 86);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guam ', 87);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guinea-Bissau ', 88);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Guayana ', 89);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Hong Kong ', 90);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Heard y McDonald ', 91);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Honduras ', 92);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Croacia', 93);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Haití ', 94);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Hungría ', 95);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Indonesia ', 96);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Irlanda ', 97);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Israel ', 98);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('India ', 99);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Territorio Británico del Océano Índico', 100);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Irak ', 101);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Irán ', 102);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islandia ', 103);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Italia ', 104);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Jamaica ', 105);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Jordania ', 106);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Japón ', 107);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Kenia ', 108);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Kirguistán ', 109);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Camboya ', 110);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Kiribati ', 111);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Comoras ', 112);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Saint Kitts y Nevis ', 113);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Corea del Norte ', 114);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Corea del Sur ', 115);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Kuwait ', 116);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Las Islas Caimán ', 117);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Kazajstán ', 118);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Laos ', 119);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Líbano ', 120);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Santa Lucía ', 121);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Liechtenstein ', 122);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Sri Lanka ', 123);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Liberia ', 124);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Lesoto ', 125);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Lituania ', 126);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Luxemburgo ', 127);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Letonia ', 128);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Libia ', 129);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Marruecos ', 130);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Mónaco ', 131);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Moldavia ', 132);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Madagascar ', 133);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Marshall ', 134);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Macedonia ', 135);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Malí ', 136);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Myanmar ', 137);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Mongolia ', 138);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Macao ', 139);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Marianas del Norte ', 140);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Martinica ', 141);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Mauritania ', 142);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Montserrat ', 143);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Malta ', 144);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Mauricio ', 145);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Maldivas ', 146);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Malawi ', 147);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('México ', 148);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Malasia ', 149);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Mozambique ', 150);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Namibia ', 151);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Nueva Caledonia ', 152);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Níger ', 153);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Norfolk Island ', 154);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Nigeria ', 155);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Nicaragua ', 156);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Países Bajos ', 157);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Noruega ', 158);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Nepal ', 159);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Nauru ', 160);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Niue ', 161);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Nueva Zelanda ', 162);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Omán ', 163);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Panamá ', 164);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Perú ', 165);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Polinesia francés ', 166);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Papua Nueva Guinea ', 167);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Filipinas ', 168);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Pakistán ', 169);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Polonia ', 170);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('San Pedro y Miquelón ', 171);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Pitcairn ', 172);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Puerto Rico ', 173);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Portugal ', 174);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Palau ', 175);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Paraguay ', 176);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Qatar ', 177);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Reunión ', 178);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Rumania ', 179);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('La Federación de Rusia ', 180);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Ruanda ', 181);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Arabia Saudita ', 182);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Las Islas Salomón ', 183);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Seychelles ', 184);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Sudán ', 185);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Suecia ', 186);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Singapur ', 187);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Santa Elena ', 188);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Eslovenia ', 189);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Svalbard y Jan Mayen ', 190);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('República Eslovaca ', 191);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Sierra Leona ', 192);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('San Marino ', 193);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Senegal ', 194);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Somalia ', 195);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Suriname ', 196);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Santo Tomé y Príncipe ', 197);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('El Salvador ', 198);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Siria ', 199);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Swazilandia ', 200);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Turcas y Caicos ', 201);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Chad ', 202);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Territorios del sur francés ', 203);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Togo ', 204);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Tailandia ', 205);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Tayikistán ', 206);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Tokelau ', 207);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Turkmenistán ', 208);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Túnez ', 209);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Tonga ', 210);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Timor Oriental ', 211);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Turquía ', 212);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Trinidad y Tobago ', 213);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Tuvalu ', 214);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Taiwan ', 215);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Tanzania ', 216);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Ucrania ', 217);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Uganda ', 218);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Reino Unido ', 219);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas menores  de EE.UU.', 220);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Estados Unidos de América (EE.UU.) ', 221);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Uruguay ', 222);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Uzbekistán ', 223);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Ciudad del Vaticano ', 224);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('San Vicente y las Granadinas ', 225);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Venezuela ', 226);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Vírgenes (Británicas) ', 227);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Vietnam ', 228);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Vanuatu ', 229);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Islas Wallis y Futuna ', 230);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Samoa ', 231);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Yemen ', 232);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Mayotte ', 233);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Yugoslavia ', 234);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Sudáfrica ', 235);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Zambia ', 236);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Zaire ', 237);
      insert into `{$dbPrefix}_paises` (`nombre`, `pais_id`) values ('Zimbabue ', 238);");
}

if(!$CI->db->table_exists("{$dbPrefix}_tipo_registro"))
{
  $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_registro` (
    `tipo_registro_id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(60) NOT NULL,
    `materia` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`tipo_registro_id`))
  ENGINE = InnoDB
  COMMENT = 'Tabla de tipos de registros'"
  );
}

if(!$CI->db->table_exists("{$dbPrefix}_boletines"))
{
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_boletines` (
      `boletin_id` INT NOT NULL AUTO_INCREMENT,
      `fecha_publicacion` DATE NOT NULL,
      `nombre` VARCHAR(60) NOT NULL,
      `pais_id` INT NOT NULL,
      PRIMARY KEY (`boletin_id`),
      INDEX `paises_boletines_fk` (`pais_id` ASC) VISIBLE,
      CONSTRAINT `paises_boletines_fk`
        FOREIGN KEY (`pais_id`)
        REFERENCES `{$dbPrefix}_paises` (`pais_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'tabla de almacenamiento de boletines';
    ");
}

if(!$CI->db->table_exists("{$dbPrefix}_clase_niza"))
{
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_clase_niza` (
        `niza_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        `descripcion` LONGTEXT NULL,
        PRIMARY KEY (`niza_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las clases de niza;
    ");
}

if(!$CI->db->table_exists("{$dbPrefix}_marcas"))
{
    $CI->db->query(
        "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas` (
          `marca_id` INT NOT NULL AUTO_INCREMENT,
          `nombre` VARCHAR(60) NOT NULL,
          `clase_niza_id` INT NOT NULL,
          PRIMARY KEY (`marca_id`),
          INDEX `clasniza_marcas_fk` (`clase_niza_id` ASC) VISIBLE,
          CONSTRAINT `clasniza_marcas_fk`
            FOREIGN KEY (`clase_niza_id`)
            REFERENCES `{$dbPrefix}_clase_niza` (`niza_id`)
            ON DELETE CASCADE
            ON UPDATE CASCADE)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8mb4
        COLLATE = utf8mb4_0900_ai_ci
        COMMENT = 'Tabla de marcas';
        "
    );
}

if(!$CI->db->table_exists("{$dbPrefix}_oficinas"))
{
    $CI->db->query(
        "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_oficinas` (
          `oficina_id` INT NOT NULL,
          `direccion` VARCHAR(512) NOT NULL,
          PRIMARY KEY (`oficina_id`))
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8mb4
        COLLATE = utf8mb4_0900_ai_ci
        COMMENT = 'Tabla de almacenamiento de Oficinas';
        "
    );
}

if(!$CI->db->table_exists("{$dbPrefix}_tipo_solicitud"))
{
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_solicitud` (
      `tipo_id` INT NOT NULL AUTO_INCREMENT,
      `nombre` VARCHAR(60) NOT NULL,
      PRIMARY KEY (`tipo_id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla Maestra de tipo de solicitudes';"
    );
}

if(!$CI->db->table_exists("{$dbPrefix}_acciones_marcas_terceros"))
{
  $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_acciones_marcas_terceros` (
    `accion_id` INT NOT NULL,
    `tipo_id` INT NOT NULL,
    `oficina_id` INT NOT NULL,
    `marca_id_base` INT NULL DEFAULT NULL COMMENT 'marca base',
    `marca_id_opuesta` INT NULL DEFAULT NULL COMMENT 'marca opuesta',
    `boletin_id` INT NOT NULL,
    `customer_id` INT NOT NULL,
    `staff_id` INT NOT NULL,
    PRIMARY KEY (`accion_id`),
    INDEX `oficinas_accion_id_fk` (`oficina_id` ASC) VISIBLE,
    INDEX `tipo_solicitud_accion_id_fk` (`tipo_id` ASC) VISIBLE,
    INDEX `boletines_accion_id_fk` (`boletin_id` ASC) VISIBLE,
    INDEX `marcas_accion_id_fk` (`marca_id_base` ASC) VISIBLE,
    INDEX `marcas_accion_id_fk1` (`marca_id_opuesta` ASC) VISIBLE,
    CONSTRAINT `boletines_accion_id_fk`
      FOREIGN KEY (`boletin_id`)
      REFERENCES `{$dbPrefix}_tm_boletines` (`boletin_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `marcas_accion_id_fk`
      FOREIGN KEY (`marca_id_base`)
      REFERENCES `{$dbPrefix}_marcas` (`marca_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `marcas_accion_id_fk1`
      FOREIGN KEY (`marca_id_opuesta`)
      REFERENCES `{$dbPrefix}_marcas` (`marca_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `oficinas_accion_id_fk`
      FOREIGN KEY (`oficina_id`)
      REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
    CONSTRAINT `tipo_solicitud_accion_id_fk`
      FOREIGN KEY (`tipo_id`)
      REFERENCES `{$dbPrefix}_tipo_solicitud` (`tipo_id`)
      ON DELETE CASCADE
      ON UPDATE CASCADE)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci
  COMMENT = 'Tabla de acciones a terceros';"
  );

  if(!$CI->db->table_exists("{$dbPrefix}_materias"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_materias` (
        `materia_id` INT NOT NULL AUTO_INCREMENT,
        `descripcion` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`materia_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de las materias';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_evento"))
  {
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_evento` (
      `tipo_eve_id` INT NOT NULL AUTO_INCREMENT,
      `nombre` VARCHAR(160) NOT NULL,
      `materia_id` INT NOT NULL,
      `created_at` DATE NOT NULL,
      `modified_at` DATE NOT NULL,
      `created_by` INT NULL DEFAULT NULL COMMENT 'FK with staff_id',
      PRIMARY KEY (`tipo_eve_id`),
      INDEX `materias_tipo_evento_fk` (`materia_id` ASC) VISIBLE,
      CONSTRAINT `materias_tipo_evento_fk`
        FOREIGN KEY (`materia_id`)
        REFERENCES `{$dbPrefix}_materias` (`materia_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla maestra  de eventos';");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_eventos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_eventos` (
        `eve_id` INT NOT NULL AUTO_INCREMENT,
        `tipo_eve_id` INT NOT NULL,
        `created_at` DATE NOT NULL,
        `staff_id` INT NULL DEFAULT NULL COMMENT 'FK with Staff_id',
        PRIMARY KEY (`eve_id`),
        INDEX `tipo_evento_eventos_fk` (`tipo_eve_id` ASC) VISIBLE,
        CONSTRAINT `tipo_evento_eventos_fk`
          FOREIGN KEY (`tipo_eve_id`)
          REFERENCES `{$dbPrefix}_tipo_evento` (`tipo_eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de eventos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_acciones_terceros_eventos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_acciones_terceros_eventos` (
        `acc_ter_id` INT NOT NULL AUTO_INCREMENT,
        `accion_id` INT NOT NULL,
        `eve_id` INT NOT NULL,
        PRIMARY KEY (`acc_ter_id`),
        INDEX `eventos_acciones_terceros_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `accion_id_acciones_terceros_eventos_fk` (`accion_id` ASC) VISIBLE,
        CONSTRAINT `accion_id_acciones_terceros_eventos_fk`
          FOREIGN KEY (`accion_id`)
          REFERENCES `{$dbPrefix}_acciones_marcas_terceros` (`accion_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `eventos_acciones_terceros_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los eventos de marcas de terceros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_expedientes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_expedientes` (
      `exp_id` INT NOT NULL AUTO_INCREMENT,
      `solicitud` VARCHAR(255) NOT NULL,
      `fecha_solicitud` DATE NOT NULL,
      `registro` VARCHAR(255) NOT NULL,
      `fecha_registro` DATE NOT NULL,
      `certificado` VARCHAR(255) NOT NULL,
      `fecha_emision_certificado` DATE NOT NULL,
      `fecha_vencimiento_certificado` DATE NOT NULL,
      PRIMARY KEY (`exp_id`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de almacenamiento de todos los expedientes\n';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_acciones_terceros_expedientes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_acciones_terceros_expedientes` (
        `acc_ter_id` INT NOT NULL AUTO_INCREMENT,
        `ref_interna` VARCHAR(255) NOT NULL,
        `ref_cliente` VARCHAR(255) NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        `exp_id` INT NOT NULL,
        PRIMARY KEY (`acc_ter_id`),
        INDEX `expediente_acciones_terceros_expedientes_fk` (`exp_id` ASC) VISIBLE,
        CONSTRAINT `expediente_acciones_terceros_expedientes_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los expedientes de terceros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_estados_solicitudes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_estados_solicitudes` (
        `cod_estado_id` INT NOT NULL AUTO_INCREMENT,
        `descripcion` VARCHAR(255) NULL DEFAULT NULL,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`cod_estado_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de estados de solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_anexos"))
  {
    $CI->db->query("
    CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_anexos` (
      `anexo_id` INT NOT NULL AUTO_INCREMENT,
      `customer_id` INT NOT NULL,
      `oficina_gestora` INT NOT NULL,
      `fecha_resolucion` DATE NOT NULL,
      `nro_resolucion` INT NOT NULL,
      `cod_estado_id` INT NOT NULL,
      PRIMARY KEY (`anexo_id`),
      INDEX `oficinas_anexos_solicitudes_fk` (`oficina_gestora` ASC) VISIBLE,
      INDEX `estados_solicitudes_anexos_solicitudes_fk` (`cod_estado_id` ASC) VISIBLE,
      CONSTRAINT `estados_solicitudes_anexos_solicitudes_fk`
        FOREIGN KEY (`cod_estado_id`)
        REFERENCES `{$dbPrefix}_estados_solicitudes` (`cod_estado_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
      CONSTRAINT `oficinas_anexos_solicitudes_fk`
        FOREIGN KEY (`oficina_gestora`)
        REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de almacenamiento de los anexos de las solicitudes y patentes';
    ");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_anexo"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_anexo` (
        `tip_ax_id` INT NOT NULL AUTO_INCREMENT,
        `nombre_anexo` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tip_ax_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla con los tipos de anexos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipos_participacion"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipos_participacion` (
        `tipo_part_id` INT NOT NULL AUTO_INCREMENT,
        `nombre_tipo` VARCHAR(60) NOT NULL,
        `tip_ax_id` INT NOT NULL,
        PRIMARY KEY (`tipo_part_id`),
        INDEX `tipo_anexo_part_id_fk` (`tip_ax_id` ASC) VISIBLE,
        CONSTRAINT `tipo_anexo_part_id_fk`
          FOREIGN KEY (`tip_ax_id`)
          REFERENCES `{$dbPrefix}_tipo_anexo` (`tip_ax_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los tipos de participacion';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_anexo_participante"))
  {
    $CI->db->query(
    "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_anexo_participante` (
      `ax_part_id` INT NOT NULL AUTO_INCREMENT,
      `anexo_id` INT NOT NULL,
      `nombre_participante` VARCHAR(60) NOT NULL,
      `tipo_part_id` INT NOT NULL,
      PRIMARY KEY (`ax_part_id`),
      INDEX `part_id_anexo_participante_fk` (`tipo_part_id` ASC) VISIBLE,
      INDEX `anexos_solicitudes_anexo_participante_fk` (`anexo_id` ASC) VISIBLE,
      CONSTRAINT `anexos_solicitudes_anexo_participante_fk`
        FOREIGN KEY (`anexo_id`)
        REFERENCES `{$dbPrefix}_tm_anexos` (`anexo_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
      CONSTRAINT `part_id_anexo_participante_fk`
        FOREIGN KEY (`tipo_part_id`)
        REFERENCES `{$dbPrefix}_tipos_participacion` (`tipo_part_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de participantes en los anexos';
    ");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_registros_principales"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_registros_principales` (
        `reg_num_id` INT NOT NULL,
        `staff_id` INT NULL DEFAULT NULL COMMENT 'FK to staff_id',
        `client_id` INT NULL DEFAULT NULL COMMENT 'FK with Client_id',
        `oficina_id` INT NOT NULL,
        `ref_interna` VARCHAR(40) NOT NULL,
        `ref_cliente` VARCHAR(40) NOT NULL,
        `carpeta` VARCHAR(40) NOT NULL,
        `libro` INT NOT NULL,
        `tomo` INT NOT NULL,
        `folio` INT NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        `tipo_registro_id` INT NULL,
        PRIMARY KEY (`reg_num_id`),
        INDEX `oficinas_registros_fk` (`oficina_id` ASC) VISIBLE,
        CONSTRAINT `tipo_registro_fk`
          FOREIGN KEY (`tipo_registro_id`)
          REFERENCES `{$dbPrefix}_tipo_registro` (`tipo_registro_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
        CONSTRAINT `oficinas_registros_fk`
          FOREIGN KEY (`oficina_id`)
          REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los elementos basicos de las solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipos_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipos_patentes` (
        `tip_pat_id` INT NOT NULL AUTO_INCREMENT,
        `nombre_tipo` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tip_pat_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de tipos de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_solicitud_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_solicitud_patentes` (
        `sol_pat_id` INT NOT NULL AUTO_INCREMENT,
        `tip_pat_id` INT NOT NULL,
        `pais_pat` INT NOT NULL,
        `titulo` VARCHAR(60) NOT NULL,
        `descripcion` VARCHAR(255) NOT NULL,
        `clasificacion` VARCHAR(40) NOT NULL,
        `reg_num_id` INT NOT NULL,
        PRIMARY KEY (`sol_pat_id`),
        INDEX `tipos_patentes_solicitud_patentes_fk` (`tip_pat_id` ASC) VISIBLE,
        INDEX `registros_solicitud_patentes_fk` (`reg_num_id` ASC) VISIBLE,
        INDEX `paises_solicitud_patentes_fk` (`pais_pat` ASC) VISIBLE,
        CONSTRAINT `paises_solicitud_patentes_fk`
          FOREIGN KEY (`pais_pat`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitud_patentes_fk`
          FOREIGN KEY (`reg_num_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipos_patentes_solicitud_patentes_fk`
          FOREIGN KEY (`tip_pat_id`)
          REFERENCES `{$dbPrefix}_tipos_patentes` (`tip_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de solicitudes de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_anexos_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_anexos_patentes` (
        `anx_pat_id` INT NOT NULL AUTO_INCREMENT,
        `num_anexo` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        PRIMARY KEY (`anx_pat_id`),
        INDEX `anexos_anexos_patentes_fk` (`num_anexo` ASC) VISIBLE,
        INDEX `solicitud_patentes_anexos_patentes_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `anexos_anexos_patentes_fk`
          FOREIGN KEY (`num_anexo`)
          REFERENCES `{$dbPrefix}_tm_anexos` (`anexo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_anexos_patentes_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de union entre los anexos y las patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_solicitudes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_solicitudes` (
        `solicitud_id` INT NOT NULL AUTO_INCREMENT,
        `reg_num_id` INT NOT NULL,
        `tipo_id` INT NOT NULL,
        `cod_estado_id` INT NOT NULL,
        `primer_uso` DATE NOT NULL,
        `prueba_uso` DATE NOT NULL,
        `carpeta` VARCHAR(40) NOT NULL,
        `numero_solicitud` VARCHAR(40) NOT NULL,
        `fecha_solicitud` DATE NOT NULL,
        `fecha_registro` DATE NULL DEFAULT NULL,
        `fecha_certificado` DATE NULL DEFAULT NULL,
        `num_certificado` VARCHAR(255) NOT NULL,
        `fecha_vencimiento` DATE NOT NULL,
        PRIMARY KEY (`solicitud_id`),
        INDEX `registros_marcas_solicitudes_fk` (`reg_num_id` ASC) VISIBLE,
        INDEX `estados_solicitudes_solicitudes_fk` (`cod_estado_id` ASC) VISIBLE,
        INDEX `tipo_solicitud_solicitudes_fk` (`tipo_id` ASC) VISIBLE,
        CONSTRAINT `estados_solicitudes_solicitudes_fk`
          FOREIGN KEY (`cod_estado_id`)
          REFERENCES `{$dbPrefix}_estados_solicitudes` (`cod_estado_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_marcas_solicitudes_fk`
          FOREIGN KEY (`reg_num_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_solicitud_solicitudes_fk`
          FOREIGN KEY (`tipo_id`)
          REFERENCES `{$dbPrefix}_tipo_solicitud` (`tipo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_anexos_solicitudes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_anexos_solicitudes` (
        `anx_sol_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `anexo_id` INT NOT NULL,
        PRIMARY KEY (`anx_sol_id`),
        INDEX `anexos_anexos_solicitudes_fk` (`anexo_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_anexos_solicitudes_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `anexos_anexos_solicitudes_fk`
          FOREIGN KEY (`anexo_id`)
          REFERENCES `{$dbPrefix}_tm_anexos` (`anexo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_anexos_solicitudes_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de union entre solicitudes y los anexos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_busqueda_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_busqueda_marcas` (
        `busq_id` INT NOT NULL AUTO_INCREMENT,
        `customer_id` INT NOT NULL,
        `fecha_solicitud` DATE NOT NULL,
        `fecha_respuesta` DECIMAL(10,0) NOT NULL,
        `has_backgrounds` TINYINT(1) NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        `pais_id` INT NOT NULL,
        PRIMARY KEY (`busq_id`),
        INDEX `paises_marbusq_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_marbusq_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de busqueda de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_busqueda"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_busqueda` (
        `tipo_busq_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tipo_busq_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de los tipo de busqueda';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_busqueda_tipo"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_busqueda_tipo` (
        `busq_tipo_id` INT NOT NULL,
        `busq_id` INT NOT NULL,
        `tipo_busq_id` INT NOT NULL,
        PRIMARY KEY (`busq_tipo_id`),
        INDEX `tipo_busqueda_busqieda_tipo_fk` (`tipo_busq_id` ASC) VISIBLE,
        INDEX `marbusq_busqieda_tipo_fk` (`busq_id` ASC) VISIBLE,
        CONSTRAINT `marbusq_busqieda_tipo_fk`
          FOREIGN KEY (`busq_id`)
          REFERENCES `{$dbPrefix}_busqueda_marcas` (`busq_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_busqueda_busqieda_tipo_fk`
          FOREIGN KEY (`tipo_busq_id`)
          REFERENCES `{$dbPrefix}_tipo_busqueda` (`tipo_busq_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla que almacena que tipo de busqueda por cada busqueda';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_contacto_registro"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_contacto_registro` (
        `con_reg_id` INT NOT NULL AUTO_INCREMENT,
        `num_reg_id` INT NOT NULL,
        `client_id` INT NOT NULL,
        `contact_id` INT NULL DEFAULT NULL COMMENT 'FK to contacts module',
        PRIMARY KEY (`con_reg_id`),
        INDEX `registros_contacto_registro_fk` (`num_reg_id` ASC) VISIBLE,
        CONSTRAINT `registros_contacto_registro_fk`
          FOREIGN KEY (`num_reg_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los contactos de los clientes en los registros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_documentos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_documentos` (
        `doc_id` INT NOT NULL AUTO_INCREMENT,
        `doc_hash` VARCHAR(64) NULL DEFAULT NULL COMMENT 'Must be sha256 or sha512',
        `path` VARCHAR(255) NOT NULL,
        `descripcion` VARCHAR(255) NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        `created_at` DATE NOT NULL,
        `created_by` INT NULL DEFAULT NULL COMMENT 'FK with Staff member',
        PRIMARY KEY (`doc_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de rutas de documentos';"
    );
  }
  
  if(!$CI->db->table_exists("{$dbPrefix}_documentos_accion_terceros"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_documentos_accion_terceros` (
        `doc_acc_id` INT NOT NULL AUTO_INCREMENT,
        `accion_id` INT NOT NULL,
        `doc_id` INT NOT NULL,
        PRIMARY KEY (`doc_acc_id`),
        INDEX `documentos_doc_acc_ter_fk` (`doc_id` ASC) VISIBLE,
        INDEX `accion_id_doc_acc_ter_fk` (`accion_id` ASC) VISIBLE,
        CONSTRAINT `accion_id_doc_acc_ter_fk`
          FOREIGN KEY (`accion_id`)
          REFERENCES `{$dbPrefix}_acciones_marcas_terceros` (`accion_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `documentos_doc_acc_ter_fk`
          FOREIGN KEY (`doc_id`)
          REFERENCES `{$dbPrefix}_tm_documentos` (`doc_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de documentos de terceros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_docu_solicitudes_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_docu_solicitudes_marcas` (
        `doc_sol_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `doc_id` INT NOT NULL,
        PRIMARY KEY (`doc_sol_id`),
        INDEX `documentos_doc_solicitud_fk` (`doc_id` ASC) VISIBLE,
        INDEX `solicitudes_doc_solicitud_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `documentos_doc_solicitud_fk`
          FOREIGN KEY (`doc_id`)
          REFERENCES `{$dbPrefix}_tm_documentos` (`doc_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_doc_solicitud_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de documentos de solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_grupos_registros_sanitarios"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_grupos_registros_sanitarios` (
        `grupo_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`grupo_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los grupos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_registros_sanitarios"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_registros_sanitarios` (
        `reg_san_id` INT NOT NULL AUTO_INCREMENT,
        `reg_num_id` INT NOT NULL,
        `staff_id` INT NOT NULL,
        `pais_id` INT NOT NULL,
        `grupo_id` INT NOT NULL,
        PRIMARY KEY (`reg_san_id`),
        INDEX `registros_grupos_registros_sanitarios_fk` (`grupo_id` ASC) VISIBLE,
        INDEX `registros_registros_sanitarios_fk` (`reg_num_id` ASC) VISIBLE,
        INDEX `paises_registros_sanitarios_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_registros_sanitarios_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_grupos_registros_sanitarios_fk`
          FOREIGN KEY (`grupo_id`)
          REFERENCES `{$dbPrefix}_grupos_registros_sanitarios` (`grupo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_registros_sanitarios_fk`
          FOREIGN KEY (`reg_num_id`)
          REFERENCES `{$dbPrefix}_tm_registros_principales` (`reg_num_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los registros sanitarios';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_registros_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_registros_solicitantes` (
        `reg_sol_id` INT NOT NULL AUTO_INCREMENT,
        `reg_san_id` INT NOT NULL,
        `pais_id` INT NOT NULL,
        `marca_id` INT NOT NULL,
        `client_id` INT NULL DEFAULT NULL COMMENT 'FK to client_id',
        `fabricante_nombre` VARCHAR(60) NOT NULL,
        `fabricante_ciudad` VARCHAR(60) NOT NULL,
        `fecha_orden_muestra` DATE NOT NULL,
        `fecha_presentacion_muestra` DATE NOT NULL,
        `comentarios` VARCHAR(4000) NOT NULL,
        PRIMARY KEY (`reg_sol_id`),
        INDEX `paises_registros_solicitantes_fk` (`pais_id` ASC) VISIBLE,
        INDEX `registros_sanitarios_registros_solicitantes_fk` (`reg_san_id` ASC) VISIBLE,
        INDEX `marcas_registros_solicitantes_fk` (`marca_id` ASC) VISIBLE,
        CONSTRAINT `marcas_registros_solicitantes_fk`
          FOREIGN KEY (`marca_id`)
          REFERENCES `{$dbPrefix}_marcas` (`marca_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `paises_registros_solicitantes_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_sanitarios_registros_solicitantes_fk`
          FOREIGN KEY (`reg_san_id`)
          REFERENCES `{$dbPrefix}_registros_sanitarios` (`reg_san_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los registros de los solicitantes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_documentos_registros"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_documentos_registros` (
        `doc_reg_id` INT NOT NULL AUTO_INCREMENT,
        `reg_sol_id` INT NOT NULL,
        `doc_id` INT NOT NULL,
        PRIMARY KEY (`doc_reg_id`),
        INDEX `documentos_documentos_registros_fk` (`doc_id` ASC) VISIBLE,
        INDEX `registros_solicitantes_documentos_registros_fk` (`reg_sol_id` ASC) VISIBLE,
        CONSTRAINT `documentos_documentos_registros_fk`
          FOREIGN KEY (`doc_id`)
          REFERENCES `{$dbPrefix}_tm_documentos` (`doc_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitantes_documentos_registros_fk`
          FOREIGN KEY (`reg_sol_id`)
          REFERENCES `{$dbPrefix}_tm_registros_solicitantes` (`reg_sol_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de registros de los documentos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_estados"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_estados` (
        `estado_id` INT NOT NULL AUTO_INCREMENT,
        `materia_id` INT NOT NULL,
        `codigo` INT NOT NULL DEFAULT 0,
        `descripcion` VARCHAR(255) NOT NULL,
        `created_at` DATE NOT NULL,
        `last_modified` DATE NOT NULL,
        `created_by` INT NULL DEFAULT NULL COMMENT 'FK to staff_id',
        PRIMARY KEY (`estado_id`),
        INDEX `materias_estados_fk` (`materia_id` ASC) VISIBLE,
        CONSTRAINT `materias_estados_fk`
          FOREIGN KEY (`materia_id`)
          REFERENCES `{$dbPrefix}_materias` (`materia_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de estados';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_expedientes_registros"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_expedientes_registros` (
        `exp_reg_id` INT NOT NULL AUTO_INCREMENT,
        `reg_sol_id` INT NOT NULL,
        `exp_id` INT NOT NULL,
        PRIMARY KEY (`exp_reg_id`),
        INDEX `expediente_expedientes_registros_fk` (`exp_id` ASC) VISIBLE,
        INDEX `registros_solicitantes_expedientes_registros_fk` (`reg_sol_id` ASC) VISIBLE,
        CONSTRAINT `expediente_expedientes_registros_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitantes_expedientes_registros_fk`
          FOREIGN KEY (`reg_sol_id`)
          REFERENCES `{$dbPrefix}_tm_registros_solicitantes` (`reg_sol_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los expedientes de los registros';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_expedientes_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_expedientes_marcas` (
        `mar_exp_id` INT NOT NULL AUTO_INCREMENT,
        `exp_id` INT NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`mar_exp_id`),
        INDEX `expediente_marcas_expedientes_fk` (`exp_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_marcas_expedientes_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `expediente_marcas_expedientes_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_marcas_expedientes_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de expedientes de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_prioridad"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_prioridad` (
        `prioridad_id` INT NOT NULL AUTO_INCREMENT,
        `pais_id` INT NOT NULL,
        `num_prioridad` VARCHAR(255) NOT NULL,
        `fecha_prioridad` DATE NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`prioridad_id`),
        INDEX `solicitudes_prioridad_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `paises_prioridad_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_prioridad_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_prioridad_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'tabla de prioridad de la solicitud de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipo_publicacion"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipo_publicacion` (
        `tipo_pub_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tipo_pub_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de tipo de publicacion';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_publicaciones"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_publicaciones` (
        `pub_id` INT NOT NULL AUTO_INCREMENT,
        `boletin_id` INT NOT NULL,
        `tomo` VARCHAR(10) NOT NULL,
        `pagina` VARCHAR(2) NOT NULL,
        `tipo_pub_id` INT NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`pub_id`),
        INDEX `tipo_publicacion_publicaciones_fk` (`tipo_pub_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_marcas_publicaciones_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `boletines_publicaciones_fk` (`boletin_id` ASC) VISIBLE,
        CONSTRAINT `boletines_publicaciones_fk`
          FOREIGN KEY (`boletin_id`)
          REFERENCES `{$dbPrefix}_tm_boletines` (`boletin_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_marcas_publicaciones_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_publicacion_publicaciones_fk`
          FOREIGN KEY (`tipo_pub_id`)
          REFERENCES `{$dbPrefix}_tipo_publicacion` (`tipo_pub_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de manejo de publicaciones de marcas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_solicitantes` (
        `solicit_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`solicit_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los solicitantes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_marcas_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_marcas_solicitantes` (
        `mar_sol_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `solicit_id` INT NOT NULL,
        PRIMARY KEY (`mar_sol_id`),
        INDEX `solicitantes_marcas_solicitantes_fk` (`solicit_id` ASC) VISIBLE,
        INDEX `solicitudes_marcas_solicitantes_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `solicitantes_marcas_solicitantes_fk`
          FOREIGN KEY (`solicit_id`)
          REFERENCES `{$dbPrefix}_solicitantes` (`solicit_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_marcas_solicitantes_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de marcas de solicitantes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_niza_productos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_niza_productos` (
        `prod_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        `clase_niza_id` INT NOT NULL,
        PRIMARY KEY (`prod_id`),
        INDEX `clasniza_niza_productos_fk` (`clase_niza_id` ASC) VISIBLE,
        CONSTRAINT `clasniza_niza_productos_fk`
          FOREIGN KEY (`clase_niza_id`)
          REFERENCES `{$dbPrefix}_clase_niza` (`niza_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de productos permitidos por la clase niza';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_oficinas_contactos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_oficinas_contactos` (
        `ofi_cont_id` INT NOT NULL AUTO_INCREMENT,
        `oficina_id` INT NOT NULL,
        `contact_id` INT NOT NULL,
        PRIMARY KEY (`ofi_cont_id`),
        INDEX `oficinas_oficinas_contactos_fk` (`oficina_id` ASC) VISIBLE,
        CONSTRAINT `oficinas_oficinas_contactos_fk`
          FOREIGN KEY (`oficina_id`)
          REFERENCES `{$dbPrefix}_oficinas` (`oficina_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de contactos de oficinas';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tm_paises_designados"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tm_paises_designados` (
        `pais_design_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `pais_id` INT NOT NULL,
        PRIMARY KEY (`pais_design_id`),
        INDEX `tipo_solicitud_paises_designados_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `paises_paises_designados_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_paises_designados_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_solicitud_paises_designados_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'tabla de paises designados';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_eventos_patentes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_eventos_patentes` (
        `eve_pat_id` INT NOT NULL AUTO_INCREMENT,
        `eve_id` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        PRIMARY KEY (`eve_pat_id`),
        INDEX `eventos_patentes_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_eventos_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `eventos_patentes_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_eventos_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los eventos de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_expediente"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_expediente` (
        `pat_exp_id` INT NOT NULL AUTO_INCREMENT,
        `exp_id` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        `nro_soli_pat` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Nro solicitud SAPI',
        `fecha_solicitud` DATE NOT NULL,
        `nro_publicacion` VARCHAR(255) NOT NULL,
        `fecha_publicacion` DATE NOT NULL,
        PRIMARY KEY (`pat_exp_id`),
        INDEX `expediente_patentes_expediente_fk` (`exp_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_expediente_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `expediente_patentes_expediente_fk`
          FOREIGN KEY (`exp_id`)
          REFERENCES `{$dbPrefix}_expedientes` (`exp_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_expediente_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenaje de los expedientes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_inventores"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_inventores` (
        `inventor_id` INT NOT NULL AUTO_INCREMENT,
        `pais_id` INT NOT NULL,
        `nombre` VARCHAR(60) NOT NULL,
        `apellid` VARCHAR(60) NOT NULL,
        `direccion` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`inventor_id`),
        INDEX `paises_patentes_inventores_fk` (`pais_id` ASC) VISIBLE,
        CONSTRAINT `paises_patentes_inventores_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de inventores';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_prioridad"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_prioridad` (
        `pri_pat_id` INT NOT NULL AUTO_INCREMENT,
        `sol_pat_id` INT NOT NULL,
        `fecha` DATE NOT NULL,
        `pais_id` INT NOT NULL,
        PRIMARY KEY (`pri_pat_id`),
        INDEX `paises_patentes_prioridad_fk` (`pais_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_prioridad_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `paises_patentes_prioridad_fk`
          FOREIGN KEY (`pais_id`)
          REFERENCES `{$dbPrefix}_paises` (`pais_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_prioridad_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las prioridades de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_publicaciones"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_publicaciones` (
        `pat_pub_id` INT NOT NULL AUTO_INCREMENT,
        `tipo_pub_id` INT NOT NULL,
        `boletin_id` INT NOT NULL,
        `tomo` INT NOT NULL,
        `pagina` INT NOT NULL,
        `sol_pat_id` INT NOT NULL,
        PRIMARY KEY (`pat_pub_id`),
        INDEX `tipo_publicacion_patentes_publicaciones_fk` (`tipo_pub_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_publicaciones_fk` (`sol_pat_id` ASC) VISIBLE,
        INDEX `boletines_patentes_publicaciones_fk` (`boletin_id` ASC) VISIBLE,
        CONSTRAINT `boletines_patentes_publicaciones_fk`
          FOREIGN KEY (`boletin_id`)
          REFERENCES `{$dbPrefix}_tm_boletines` (`boletin_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_publicaciones_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipo_publicacion_patentes_publicaciones_fk`
          FOREIGN KEY (`tipo_pub_id`)
          REFERENCES `{$dbPrefix}_tipo_publicacion` (`tipo_pub_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las publicaciones de patentes.';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_patentes_solicitantes"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_patentes_solicitantes` (
        `pat_solic_id` INT NOT NULL AUTO_INCREMENT,
        `sol_pat_id` INT NOT NULL,
        `pat_sol_id` INT NOT NULL,
        PRIMARY KEY (`pat_solic_id`),
        INDEX `solicitantes_patentes_solicitantes_fk` (`pat_sol_id` ASC) VISIBLE,
        INDEX `solicitud_patentes_patentes_solicitantes_fk` (`sol_pat_id` ASC) VISIBLE,
        CONSTRAINT `solicitantes_patentes_solicitantes_fk`
          FOREIGN KEY (`pat_sol_id`)
          REFERENCES `{$dbPrefix}_solicitantes` (`solicit_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitud_patentes_patentes_solicitantes_fk`
          FOREIGN KEY (`sol_pat_id`)
          REFERENCES `{$dbPrefix}_tm_solicitud_patentes` (`sol_pat_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de los solicitantes de patentes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_eventos_registros_sanitarios"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_eventos_registros_sanitarios` (
        `reg_eve_id` INT NOT NULL AUTO_INCREMENT,
        `reg_sol_id` INT NOT NULL,
        `eve_id` INT NOT NULL,
        PRIMARY KEY (`reg_eve_id`),
        INDEX `eventos_registros_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `registros_solicitantes_registros_eventos_fk` (`reg_sol_id` ASC) VISIBLE,
        CONSTRAINT `eventos_registros_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `registros_solicitantes_registros_eventos_fk`
          FOREIGN KEY (`reg_sol_id`)
          REFERENCES `{$dbPrefix}_tm_registros_solicitantes` (`reg_sol_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de eventos de los registros sanitarios';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_servicios"))
  {
    $CI->db->query("CREATE TABLE IF NOT EXISTS `{$dbPrefix}_servicios` (
      `codigo` INT NOT NULL AUTO_INCREMENT,
      `materia_id` INT NOT NULL,
      `created_by` INT NULL DEFAULT NULL COMMENT 'FK with staff_id',
      `descripcion` VARCHAR(255) NOT NULL,
      `created_at` DATETIME NOT NULL,
      `modified_at` DATETIME NOT NULL,
      PRIMARY KEY (`codigo`),
      INDEX `materias_servicios_fk` (`materia_id` ASC) VISIBLE,
      CONSTRAINT `materias_servicios_fk`
        FOREIGN KEY (`materia_id`)
        REFERENCES `{$dbPrefix}_materias` (`materia_id`)
        ON DELETE CASCADE
        ON UPDATE CASCADE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8mb4
    COLLATE = utf8mb4_0900_ai_ci
    COMMENT = 'Tabla de almacenaje de los servicios';");
  }

  if(!$CI->db->table_exists("{$dbPrefix}_tipos_signos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_tipos_signos` (
        `tipos_signo_id` INT NOT NULL AUTO_INCREMENT,
        `nombre` VARCHAR(60) NOT NULL,
        PRIMARY KEY (`tipos_signo_id`))
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla maestra de los tipos de signos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_signos_solicitud_marcas"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_signos_solicitud_marcas` (
        `signos_solicitud_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `tipo_signo_id` INT NOT NULL,
        `descripcion` VARCHAR(255) NOT NULL,
        `clasificacion` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`signos_solicitud_id`),
        INDEX `tipos_signos_signos_solicitud_fk` (`tipo_signo_id` ASC) VISIBLE,
        INDEX `tipo_solicitud_signos_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `tipo_solicitud_signos_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `tipos_signos_signos_solicitud_fk`
          FOREIGN KEY (`tipo_signo_id`)
          REFERENCES `{$dbPrefix}_tipos_signos` (`tipos_signo_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de signos';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_solicitudes_clases"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_solicitudes_clases` (
        `sol_cla_id` INT NOT NULL AUTO_INCREMENT,
        `solicitud_id` INT NOT NULL,
        `clase_niza_id` INT NOT NULL,
        PRIMARY KEY (`sol_cla_id`),
        INDEX `solicitudes_solicitudes_clases_fk` (`solicitud_id` ASC) VISIBLE,
        INDEX `clasniza_solicitudes_clases_fk` (`clase_niza_id` ASC) VISIBLE,
        CONSTRAINT `clasniza_solicitudes_clases_fk`
          FOREIGN KEY (`clase_niza_id`)
          REFERENCES `{$dbPrefix}_clase_niza` (`niza_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `solicitudes_solicitudes_clases_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de almacenamiento de las clases de niza en las solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_solicitudes_eventos"))
  {
    $CI->db->query(
      "CREATE TABLE IF NOT EXISTS `{$dbPrefix}_solicitudes_eventos` (
        `sol_eve_id` INT NOT NULL AUTO_INCREMENT,
        `eve_id` INT NOT NULL,
        `solicitud_id` INT NOT NULL,
        PRIMARY KEY (`sol_eve_id`),
        INDEX `eventos_solicitudes_eventos_fk` (`eve_id` ASC) VISIBLE,
        INDEX `marcas_solicitudes_solicitudes_eventos_fk` (`solicitud_id` ASC) VISIBLE,
        CONSTRAINT `eventos_solicitudes_eventos_fk`
          FOREIGN KEY (`eve_id`)
          REFERENCES `{$dbPrefix}_eventos` (`eve_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
        CONSTRAINT `marcas_solicitudes_solicitudes_eventos_fk`
          FOREIGN KEY (`solicitud_id`)
          REFERENCES `{$dbPrefix}_marcas_solicitudes` (`solicitud_id`)
          ON DELETE CASCADE
          ON UPDATE CASCADE)
      ENGINE = InnoDB
      DEFAULT CHARACTER SET = utf8mb4
      COLLATE = utf8mb4_0900_ai_ci
      COMMENT = 'Tabla de registro de los eventos en las solicitudes';"
    );
  }

  if(!$CI->db->table_exists("{$dbPrefix}_propietarios"))
  {
    "CREATE TABLE `{$dbPrefix}_propietarios` (
      `id` int NOT NULL AUTO_INCREMENT,
      `pais_id` int NOT NULL,
      `codigo` varchar(20) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `propietario` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `estado_civil` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `representante_legal` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `direccion` longtext COLLATE utf8mb4_0900_ai_ci,
      `ciudad` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `estado` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `codigo_postal` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `actividad_comercial` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `datos_registro` varchar(60) COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
      `notas` longtext COLLATE utf8mb4_0900_ai_ci,
      `created_at` date NOT NULL,
      `created_by` int NOT NULL COMMENT 'FK con la tabla staff_id\n',
      `modified_at` date DEFAULT NULL,
      `modified_by` int NOT NULL COMMENT 'FK con la tabla staff',
      `origen` longtext COLLATE utf8mb4_0900_ai_ci,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de propietarios';";
  }

  if(!$CI->db->table_exists("{$dbPrefix}_propietarios_documentos"))
  {
    "CREATE TABLE `{$dbPrefix}_propietarios_documentos` (
      `id` int NOT NULL AUTO_INCREMENT,
      `propietario_id` int NOT NULL,
      `comentarios` longtext COLLATE utf8mb4_0900_ai_ci,
      `archivo` varchar(255) COLLATE utf8mb4_0900_ai_ci NOT NULL,
      `descripcion` varchar(45) COLLATE utf8mb4_0900_ai_ci NOT NULL,
      PRIMARY KEY (`id`),
      KEY `propietarios_documentos_fk_idx` (`propietario_id`),
      CONSTRAINT `propietarios_documentos_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de documentos de propietarios';";
  }

  if(!$CI->db->table_exists("{$dbPrefix}_propietarios_poderes"))
  {
    "CREATE TABLE `{$dbPrefix}_propietarios_poderes` (
      `id` int NOT NULL AUTO_INCREMENT,
      `poder_num` varchar(10) COLLATE utf8mb4_0900_ai_ci NOT NULL,
      `fecha` date NOT NULL,
      `origen` longtext COLLATE utf8mb4_0900_ai_ci NOT NULL,
      `is_general` tinyint NOT NULL,
      `propietario_id` int NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `poder_num_UNIQUE` (`poder_num`),
      KEY `propietario_poderes_fk_idx` (`propietario_id`),
      CONSTRAINT `propietario_poderes_fk` FOREIGN KEY (`propietario_id`) REFERENCES `tbl_propietarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de poderes';
    ";
  }

  if(!$CI->db->table_exists("{$dbPrefix}_poderes_apoderados"))
  {
    "CREATE TABLE `{$dbPrefix}_poderes_apoderados` (
      `id` int NOT NULL AUTO_INCREMENT,
      `poder_id` int DEFAULT NULL,
      `staff_id` int NOT NULL COMMENT 'FK con la tabla staff_id',
      PRIMARY KEY (`id`),
      KEY `apoderados_poderes_fk_idx` (`poder_id`),
      CONSTRAINT `apoderados_poderes_fk` FOREIGN KEY (`poder_id`) REFERENCES `tbl_propietarios_poderes` (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabla maestra de apoderados';";
  }



  return redirect(base_url('admin'));

}