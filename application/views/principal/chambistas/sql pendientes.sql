
ALTER TABLE tbl_usuarios_personales ADD COLUMN id_profesion_oficio integer DEFAULT 0;

ALTER TABLE tbl_usuarios_personales ADD COLUMN edad bigint DEFAULT 0;

ALTER TABLE tbl_usuarios_personales ADD COLUMN id_movimiento_religioso integer DEFAULT 0;
ALTER TABLE tbl_usuarios_personales ADD COLUMN id_movimiento_socialies integer DEFAULT 0;


ALTER TABLE tbl_usuarios_productivos ADD COLUMN id_area_desarrollo_emprendedor integer DEFAULT 0;
ALTER TABLE tbl_usuarios_productivos ADD COLUMN desarrollo_proyecto_tecnologico text DEFAULT '';
ALTER TABLE tbl_usuarios_productivos ADD COLUMN id_sector_productivo integer DEFAULT 0;
ALTER TABLE tbl_usuarios_productivos ADD COLUMN id_servicios_profesionales integer DEFAULT 0;
ALTER TABLE tbl_usuarios_personales ADD COLUMN tipo_usuario integer DEFAULT 1;