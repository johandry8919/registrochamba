
ALTER TABLE tbl_usuarios_personales ADD COLUMN id_profesion_oficio integer DEFAULT 0;

ALTER TABLE tbl_usuarios_personales ADD COLUMN edad bigint DEFAULT 0;

ALTER TABLE tbl_usuarios_personales ADD COLUMN id_movimiento_religioso integer DEFAULT 0;
ALTER TABLE tbl_usuarios_personales ADD COLUMN id_movimiento_socialies integer DEFAULT 0;


ALTER TABLE tbl_usuarios_productivos ADD COLUMN id_area_desarrollo_emprendedor integer DEFAULT 0;
ALTER TABLE tbl_usuarios_productivos ADD COLUMN desarrollo_proyecto_tecnologico text DEFAULT '';
ALTER TABLE tbl_usuarios_productivos ADD COLUMN id_sector_productivo integer DEFAULT 0;
ALTER TABLE tbl_usuarios_productivos ADD COLUMN id_servicios_profesionales integer DEFAULT 0;
ALTER TABLE tbl_usuarios_personales ADD COLUMN tipo_usuario integer DEFAULT 1;


CREATE TABLE tbl_empresas_entes (
id_empresas serial PRIMARY KEY,
id_tipo_empresas_universidades integer,
tipo_empresa VARCHAR (150),
id_usuario_registro integer,
nombre_razon_social text UNIQUE NOT NULL,
rif VARCHAR ( 100 ) UNIQUE NOT NULL,
tlf_celular VARCHAR (15),
tlf_local VARCHAR (15),
email VARCHAR (150) NOT NULL,
actividad_economica VARCHAR (100),
id_sector_economico integer,
instagram VARCHAR (100),
twitter VARCHAR (100),
facebook VARCHAR (100),
codigoestado VARCHAR(10),
codigomunicipio VARCHAR(10),
codigoparroquia VARCHAR(10),
latitud text,
longitud text,
direccion text,
created_on TIMESTAMP DEFAULT now()

);

CREATE TABLE tbl_representantes_empresas_entes(
id_representantes serial PRIMARY KEY,
id_empresas_entes integer,
id_usuario integer,
id_usuario_registro integer DEFAULT 0,
cedula text UNIQUE NOT NULL,
nombre VARCHAR ( 150 ),
apellidos VARCHAR ( 200 ),
tlf_celular VARCHAR (15),
tlf_local VARCHAR (15),
email VARCHAR (200) UNIQUE NOT NULL,
cargo VARCHAR (100),
created_on TIMESTAMP DEFAULT now()

);

CREATE TABLE tipos_empresas_entes(
id_tipos serial PRIMARY KEY,
descripcion VARCHAR ( 250 ),
created_on TIMESTAMP DEFAULT now()

);


CREATE TABLE tbl_estructuras (
id_estructura serial PRIMARY KEY,
id_profesion_oficio integer,
id_nivel_academico integer,
id_usuario integer,
id_usuario_registro integer DEFAULT 0,
cedula text UNIQUE NOT NULL,
nombre VARCHAR ( 150 ),
apellidos VARCHAR ( 200 ),
tlf_celular VARCHAR (15),
tlf_coorparativo VARCHAR (15),
email VARCHAR (200) UNIQUE NOT NULL,
codigoestado VARCHAR(10),
codigomunicipio VARCHAR(10),
codigoparroquia VARCHAR(10),
talla_pantalon VARCHAR (15),
talla_camisa VARCHAR (15),
tipo_estructura VARCHAR (100),
latitud text,
longitud text,
direccion text,

created_on TIMESTAMP DEFAULT now()

);