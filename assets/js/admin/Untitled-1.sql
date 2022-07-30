



CREATE TABLE menu(
id_menu serial PRIMARY KEY,
nombre_menu VARCHAR ( 250 ),
ruta_menu VARCHAR (250),
perfil VARCHAR ( 250 ),
icono VARCHAR (100),
activo integer default 1

);

INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (1,'Incio','admin/inicio','fe fe-home','admin');
INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (2,'Registros','javascript:void(0)','fe fe-user-plus','admin');
INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (3,'Consultas','javascript:void(0)','angle fe fe-eye','admin');
INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (4,'Reportes','javascript:void(0)','angle fe fe-chevron-right','admin');
INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (5,'Admin','javascript:void(0)','angle fe fe-user','admin');


INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (6,'Incio','estructuras/inicio','fe fe-home','estructuras');
INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (7,'Registros','javascript:void(0)','fe fe-user-plus','estructuras');
INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (8,'Consultas','javascript:void(0)','angle fe fe-eye','estructuras');
INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (9,'Reportes','javascript:void(0)','angle fe fe-chevron-right','estructuras');

CREATE TABLE sub_menu(
id_submenu serial PRIMARY KEY,
id_menu integer,
nombre_submenu VARCHAR ( 250 ),
ruta VARCHAR (250),
icono VARCHAR (100),
activo integer default 1

);



INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (2,1,'Empresas u organismos ','admin/registro/empresas');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (2,2,'Centros de Estudios y Universidades','admin/registro/universidades');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (2,3,'Estructuras','admin/registro/estructuras');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (3,4,'Chambistas','admin/chambista/buscar');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (3,5,'Estructuras','admin/estructuras');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (3,6,'Centros estudios','admin/universidades');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (3,7,'Empresas','admin/empresas');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (3,8,'Ofertas de empleo','admin/ofertas');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (3,9,'Ofertas de Centros de estudios','admin/ofertasUniversidad');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (4,10,'Mapa Empresas/Centros','admin/reportes/empresas_mapa');


INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (7,11,'Empresas u organismos ','estructuras/registro/empresas');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (7,12,'Centros de Estudios y Universidades','admin/registro/universidades');

INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (8,15,'Centros estudios','estructuras/lista_universidad');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (8,16,'Empresas','estructuras/listar_empresas');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (8,17,'Ofertas de empleo','estructuras/ofertas');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (8,18,'Ofertas de Centros de estudios','estructuras/ofertasUniversidad');

INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (5,19,'Registrar Usuarios','admin/registro/usuarios');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (5,20,'Listar Usuarios','admin/usuarios');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (5,21,'Roles','admin/roles');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (4,22,'Mapa Estructuras','admin/reportes/estructuras_mapa');



CREATE TABLE rol_submenu(
id serial PRIMARY KEY,
id_submenu integer,
id_rol integer,
activo integer default 1

);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (1,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (2,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (3,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (4,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (5,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (6,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (7,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (8,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (9,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (10,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (19,2);
INSERT INTO rol_submenu(id_submenu,id_rol) VALUES (20,2);
CREATE TABLE permisos(
id_permiso serial PRIMARY KEY,
nombre_permiso VARCHAR ( 250 ),
activo integer default 1

);

INSERT INTO permisos(nombre_permiso) VALUES ('Crear');
INSERT INTO permisos(nombre_permiso) VALUES ('Modificar');
INSERT INTO permisos(nombre_permiso) VALUES ('Eliminar');
INSERT INTO permisos(nombre_permiso) VALUES ('Vincular');

CREATE TABLE rol_permisos(
id serial PRIMARY KEY,
id_permiso integer,
id_rol integer,
activo integer default 1

);

UPDATE public.tbl_roles
	SET nombre='Centros de estudios'
	WHERE id_rol=4;


    INSERT INTO public.tbl_roles(
	id_rol, nombre )
	VALUES (5, 'Empresas' );

    
    INSERT INTO public.tbl_roles(
	id_rol, nombre )
	VALUES (6, 'Instancia Nacional' );
        INSERT INTO public.tbl_roles(
	id_rol, nombre )
	VALUES (7, 'Operadores Nacional' );

    INSERT INTO public.tbl_roles(
	id_rol, nombre,perfil )
	VALUES (10, 'Estructura Nacional','estructura' );

    INSERT INTO public.tbl_roles(
	id_rol, nombre,perfil )
	VALUES (11, 'Estructura estadal','estructura');
    INSERT INTO public.tbl_roles(
	id_rol, nombre,perfil )
	VALUES (12, 'Estructura municipal','estructura' );

    INSERT INTO public.tbl_roles(
	id_rol, nombre,perfil )
	VALUES (13, 'Estructura parroquial' ,'estructura');
    
    ALTER TABLE tbl_roles ADD COLUMN perfil text DEFAULT '';
  ALTER TABLE tbl_roles ADD COLUMN activo integer DEFAULT 1;
    UPDATE public.tbl_roles
	SET perfil='admin'
	WHERE id_rol=2;

      UPDATE public.tbl_roles
	SET perfil='admin'
	WHERE id_rol=5;
    
      UPDATE public.tbl_roles
	SET perfil='admin'
	WHERE id_rol=6;
    
      UPDATE public.tbl_roles
	SET perfil='estructura'
	WHERE id_rol=3;

	    ALTER TABLE tbl_roles ADD COLUMN crear integer DEFAULT 0;
		ALTER TABLE tbl_roles ADD COLUMN  modificar integer DEFAULT 0;
		ALTER TABLE tbl_roles ADD COLUMN  eliminar integer DEFAULT 0;
		ALTER TABLE tbl_roles ADD COLUMN  vincular integer DEFAULT 0;


		    ALTER TABLE tbl_solicitudes_estudios ADD COLUMN id_empresa_entes integer DEFAULT 0;


INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (2,1,'Empresas u organismos ','estructuras/registro/empresas');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (2,2,'Centros de Estudios y Universidades','estructuras/registro/universidades');

    UPDATE public.tbl_roles SET nombre='Estructura estadal' WHERE id_rol=3;

	

    INSERT INTO public.tbl_roles(	id_rol, nombre,perfil ) VALUES (10, 'Estructura municipal' ,'estructura');
	   
  INSERT INTO public.tbl_roles(	id_rol, nombre,perfil )	VALUES (11, 'Estructura parroquial' ,'estructura');
    INSERT INTO public.tbl_roles(	id_rol, nombre,perfil )	VALUES (12, 'Brigada' ,'estructura');

		ALTER TABLE tbl_estructuras ADD COLUMN  nombre_brigada text DEFAULT '';
				ALTER TABLE tbl_estructuras ADD COLUMN  nombre_comunidad text DEFAULT '';


ALTER TABLE tbl_responsabilidad_estructuras ADD COLUMN  tipo_responsabilidad integer DEFAULT 1;
ALTER TABLE tbl_responsabilidad_estructuras RENAME COLUMN descricion TO descripcion;
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (13,'Integrante equipo - Registro y Actualizacion de Datos',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (14,'Integrante de equipo -Organizativo',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (15,'Integrante de equipo - Formación',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (16,'Integrante de equipo - Inserción Laboral',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (17,'Integrante de equipo - Productivo Emprendemiento',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (18,'Integrante de equipo - Brigadista',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (19,'Integrante de equipo - Social Vivienda',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (20,'Integrante de equipo - Debate Nacional de ley',2);
INSERT INTO tbl_responsabilidad_estructuras(id_tipos,descripcion,tipo_responsabilidad) VALUES (21,'Integrante de equipo - Comunicación',2);


CREATE TABLE tbl_brigadas_estructuras(
id_brigada serial PRIMARY KEY,
id_usuario_registro integer DEFAULT 0,
nombre_brigada VARCHAR ( 200 ),
nombre_sector VARCHAR ( 200 ),
codigoestado VARCHAR(10),
codigomunicipio VARCHAR(10),
codigoparroquia VARCHAR(10),
id_rol_estructura integer,
latitud text,
longitud text,
direccion text,
created_on TIMESTAMP DEFAULT now(),
codigo text,
activo integer default 0

);

	ALTER TABLE tbl_estructuras ADD COLUMN  id_brigada_estructura integer DEFAULT 0;
	ALTER TABLE tbl_estructuras ADD COLUMN  activo integer DEFAULT 1;

	ALTER TABLE tbl_brigadas_estructuras ADD COLUMN  codigo text  ;

INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (8,12,'Estructuras','admin/estructuras');
INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (7,13,'Estructuras','admin/registro/estructuras');


 ALTER TABLE usuarios_admin ADD COLUMN cargo text DEFAULT '';

INSERT INTO menu(id_menu,nombre_menu,ruta_menu,icono,perfil) VALUES (10,'Reportes','javascript:void(0)','angle fe fe-chevron-right','estructuras');

 INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (10,25,'Mapa Estructuras','admin/reportes/estructuras_mapa');

ALTER TABLE tbl_estructuras ALTER COLUMN id_nivel_academico SET DATA TYPE integer;

 ALTER TABLE usuarios_admin ADD COLUMN cargo text DEFAULT '';
 
ALTER TABLE tbl_estructuras DROP COLUMN id_nivel_academico;
ALTER TABLE tbl_estructuras ADD COLUMN id_nivel_academico integer;
ALTER TABLE tbl_estructuras ADD COLUMN  activo integer DEFAULT 1;

INSERT INTO sub_menu(id_menu,id_submenu,nombre_submenu,ruta) VALUES (4,26,'Chambistas','admin/reportes/chambistas');
 
 
    UPDATE public.tbl_roles SET perfil='Centros de estudios' WHERE id_rol=4;
