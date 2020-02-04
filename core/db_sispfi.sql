--
-- PostgreSQL database dump
--

-- Dumped from database version 10.11
-- Dumped by pg_dump version 10.11

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: bitacora; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bitacora (
    id_bitacora integer NOT NULL,
    id_usuario integer NOT NULL,
    actividad character varying NOT NULL,
    fecha timestamp without time zone NOT NULL
);


ALTER TABLE public.bitacora OWNER TO postgres;

--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bitacora_id_bitacora_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bitacora_id_bitacora_seq OWNER TO postgres;

--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bitacora_id_bitacora_seq OWNED BY public.bitacora.id_bitacora;


--
-- Name: novedades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.novedades (
    id_novedades integer NOT NULL,
    id_usuario integer NOT NULL,
    lugar character varying NOT NULL,
    fecha_hecho timestamp without time zone,
    fecha_reporte timestamp without time zone,
    descripcion character varying
);


ALTER TABLE public.novedades OWNER TO postgres;

--
-- Name: TABLE novedades; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.novedades IS 'tabla para el registro de novedades o incidencias';


--
-- Name: COLUMN novedades.lugar; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.novedades.lugar IS 'Granja, planta, etc';


--
-- Name: COLUMN novedades.fecha_hecho; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.novedades.fecha_hecho IS 'fecha del suceso';


--
-- Name: COLUMN novedades.fecha_reporte; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.novedades.fecha_reporte IS 'fecha en la que se reporto la novedad';


--
-- Name: COLUMN novedades.descripcion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.novedades.descripcion IS 'breve resumen del hecho';


--
-- Name: novedades_id_novedades_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.novedades_id_novedades_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.novedades_id_novedades_seq OWNER TO postgres;

--
-- Name: novedades_id_novedades_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.novedades_id_novedades_seq OWNED BY public.novedades.id_novedades;


--
-- Name: permisos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permisos (
    id_permiso integer NOT NULL,
    nombre character varying(55)
);


ALTER TABLE public.permisos OWNER TO postgres;

--
-- Name: permisos_id_permiso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permisos_id_permiso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permisos_id_permiso_seq OWNER TO postgres;

--
-- Name: permisos_id_permiso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permisos_id_permiso_seq OWNED BY public.permisos.id_permiso;


--
-- Name: radio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.radio (
    id_radio integer NOT NULL,
    codigo_usuario character varying NOT NULL,
    status character varying NOT NULL,
    centro_trabajo character varying NOT NULL,
    tipo_comunicacion character varying,
    responsable character varying,
    empresa character varying,
    codigo_ip character varying,
    serial character varying,
    marca character varying,
    modelo character varying,
    estado character varying,
    serial_bateria character varying,
    est_bateria character varying,
    est_antena character varying,
    est_perillavol character varying,
    est_perillacan character varying,
    est_dustcap character varying,
    est_beltclip character varying,
    est_teclaptt character varying,
    est_cargador character varying,
    est_adaptador character varying,
    observacion character varying
);


ALTER TABLE public.radio OWNER TO postgres;

--
-- Name: TABLE radio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.radio IS 'tabla con los datos del radio que hace el reporte';


--
-- Name: radio_id_radio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.radio_id_radio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.radio_id_radio_seq OWNER TO postgres;

--
-- Name: radio_id_radio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.radio_id_radio_seq OWNED BY public.radio.id_radio;


--
-- Name: reporte_radio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reporte_radio (
    id_reporte integer NOT NULL,
    id_usuario integer NOT NULL,
    codigo_usuario character varying(22) NOT NULL,
    fecha timestamp without time zone NOT NULL,
    descripcion character varying NOT NULL,
    canal integer
);


ALTER TABLE public.reporte_radio OWNER TO postgres;

--
-- Name: TABLE reporte_radio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.reporte_radio IS 'tabla con reporte de los radios';


--
-- Name: reporte_radio_id_reporte_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reporte_radio_id_reporte_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reporte_radio_id_reporte_seq OWNER TO postgres;

--
-- Name: reporte_radio_id_reporte_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reporte_radio_id_reporte_seq OWNED BY public.reporte_radio.id_reporte;


--
-- Name: robo_cerdo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.robo_cerdo (
    id_robo_cerdo integer NOT NULL,
    id_novedades integer NOT NULL,
    seccion character varying NOT NULL,
    cantidad integer NOT NULL,
    kilos integer NOT NULL,
    ubicacion character varying
);


ALTER TABLE public.robo_cerdo OWNER TO postgres;

--
-- Name: TABLE robo_cerdo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.robo_cerdo IS 'tabla con el registro de los robos de cerdos';


--
-- Name: COLUMN robo_cerdo.id_robo_cerdo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.robo_cerdo.id_robo_cerdo IS 'indice de la tabla llave primaria';


--
-- Name: COLUMN robo_cerdo.id_novedades; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.robo_cerdo.id_novedades IS 'llave foranea de la novedad del robo';


--
-- Name: COLUMN robo_cerdo.seccion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.robo_cerdo.seccion IS 'Seccion o area de la granja donde ocurrio el robo ej: Bateria, Engorde,Lactante, Maternidad, Recria';


--
-- Name: COLUMN robo_cerdo.cantidad; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.robo_cerdo.cantidad IS 'cantidad de animales robados';


--
-- Name: COLUMN robo_cerdo.kilos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.robo_cerdo.kilos IS 'total de kilos robados';


--
-- Name: COLUMN robo_cerdo.ubicacion; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.robo_cerdo.ubicacion IS 'ubicacion de los animales robados ej.: Galpon 2, Corral 110 Fila A';


--
-- Name: robo_cerdo_id_robo_cerdo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.robo_cerdo_id_robo_cerdo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.robo_cerdo_id_robo_cerdo_seq OWNER TO postgres;

--
-- Name: robo_cerdo_id_robo_cerdo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.robo_cerdo_id_robo_cerdo_seq OWNED BY public.robo_cerdo.id_robo_cerdo;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    username character varying(22) NOT NULL,
    password character varying NOT NULL,
    nombres character varying(32),
    apellidos character varying(32),
    cedula character varying(12),
    email character varying
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_usuario_seq OWNER TO postgres;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_usuario_seq OWNED BY public.usuario.id_usuario;


--
-- Name: usuario_permiso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario_permiso (
    id_usuario integer NOT NULL,
    id_permiso integer NOT NULL
);


ALTER TABLE public.usuario_permiso OWNER TO postgres;

--
-- Name: bitacora id_bitacora; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora ALTER COLUMN id_bitacora SET DEFAULT nextval('public.bitacora_id_bitacora_seq'::regclass);


--
-- Name: novedades id_novedades; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.novedades ALTER COLUMN id_novedades SET DEFAULT nextval('public.novedades_id_novedades_seq'::regclass);


--
-- Name: permisos id_permiso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permisos ALTER COLUMN id_permiso SET DEFAULT nextval('public.permisos_id_permiso_seq'::regclass);


--
-- Name: radio id_radio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.radio ALTER COLUMN id_radio SET DEFAULT nextval('public.radio_id_radio_seq'::regclass);


--
-- Name: reporte_radio id_reporte; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_radio ALTER COLUMN id_reporte SET DEFAULT nextval('public.reporte_radio_id_reporte_seq'::regclass);


--
-- Name: robo_cerdo id_robo_cerdo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.robo_cerdo ALTER COLUMN id_robo_cerdo SET DEFAULT nextval('public.robo_cerdo_id_robo_cerdo_seq'::regclass);


--
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuario_id_usuario_seq'::regclass);


--
-- Data for Name: bitacora; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: novedades; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: permisos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.permisos VALUES (1, 'Registrar Usuarios');


--
-- Data for Name: radio; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.radio VALUES (3, '85', 'ASIGNADO', 'ALCABALA PPAL LOS CERRITOS', 'PORTATIL', 'REINALDO MARQUEZ', 'AGRICOLA YARITAGUA', 'IP-03918', '018TPM1903', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'NNTN4970A 1720 AVFA', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', NULL);
INSERT INTO public.radio VALUES (2, '22', 'ASIGNADO', 'ALCABALA ROMANA IP', 'PORTATIL', 'ROMANA', 'INVERSIONES PORCINAS C.A.', 'IP-04060', '442TKGQ432', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'NNTN4497DR 1930 BT21', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', NULL);
INSERT INTO public.radio VALUES (19, '31', 'ASIGNADO', 'ALCABALA PRINCIPAL IP', 'PORTATIL', 'ALCABALA PRINCIPAL', 'INVERSIONES PORCINAS C.A.', 'IP-04056', '442THME877', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'NNTN4497DR 1930 BT11', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO CON DEFECTO', 'BASE DE CARGADOR SE DESPRENDE BASE DE TORNILLOS PARTIDOS, ADAPTADOR DE CARGADOR SE DESPRENDE DE IGUAL FORMA. REPORTANDO COMO CLAVE 24 EN AUSENCIA DEL LA ESTACIÓN FIJA CON CLAVE 24.');
INSERT INTO public.radio VALUES (9, '20', 'ASIGNADO', 'PROTECCION FISICA', 'PORTATIL CON PANTALLA', 'JEFE P.F.I.', 'INVERSIONES PORCINAS C.A.', 'IP-04049', '442THDQ192', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'POR REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'por registrar el serial de BATERÍA');
INSERT INTO public.radio VALUES (12, '49', 'ASIGNADO', 'GRANJA LOS CERRITOS 2', 'PORTATIL CON PANTALLA', 'REINALDO MARQUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04051', '018TML0089', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'BORRADA', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '- A LA BATERIA LE BORRARON EL SERIAL');
INSERT INTO public.radio VALUES (20, '32', 'ASIGNADO', 'PRODUCCION CERDOS', 'PORTATIL', 'MAURICIO ROJAS', 'INVERSIONES PORCINAS C.A.', 'IP-04065', '442THME867', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'NNTN4497DR 1930 BT21', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'CARCASA DEL RADIO ESTA PARTIDA POR LA PARTE BAJA.');
INSERT INTO public.radio VALUES (16, '26', 'ASIGNADO', 'VIGILANCIA ARCHIVO MUERTO', 'PORTATIL', 'SERENOS ERM C.A.', 'SERENOS ERM C.A.', 'IP-04039', '442THJE596', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'NNTN4497DR 1930 BT11', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (14, '21', 'ASIGNADO', 'PROTECCION FISICA', 'PORTATIL CON PANTALLA', 'SUPERVISOR PFI', 'INVERSIONES PORCINAS C.A.', 'IP-03916', 'D18TQM1312', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'LA BATERÍA SIN REGISTRAR');
INSERT INTO public.radio VALUES (13, '15', 'ASIGNADO', 'ALCABALA PPAL. URIMANES', 'PORTATIL CON PANTALLA', 'FRAIDE ALEJO', 'INVERSIONES PORCINAS C.A.', 'IP-04087', 'D18YQM1026', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'NNTN4497CR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (7, '36', 'ASIGNADO', 'GRANJA URIMAN 1', 'PORTATIL', 'YISEL MARTINEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04063', '442TKLQ806', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'POR REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'por registrar el serial de BATERÍA');
INSERT INTO public.radio VALUES (6, '28', 'ASIGNADO', 'GRANJA URIMAN 2 - CIAP', 'PORTATIL', 'ANA PERDOMO', 'INVERSIONES PORCINAS C.A.', 'IP-04031', '018TQM1006', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'HAY QUE UBICARLO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '- SERIAL DE LA BATERÍA HAY QUE UBICAR PARA REGISTRARLO');
INSERT INTO public.radio VALUES (5, '45', 'ASIGNADO', 'GRANJA MATACARMELERA', 'PORTATIL', 'UBICARLO', 'INVERSIONES PORCINAS C.A.', 'IP-04036', '188TXS2640', 'MOTOROLA', 'RADIUS P110', 'OPERATIVO', 'HAY QUE UBICARLO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'DAÑADO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '-EL MODELO DE RADIO NO TIENE DUSTCAP
- EL SERIAL DE LA BATERIA HAY QUE UBICARLO
-LA PERSONA RESPONSABLE HAY QUE UBICARLO');
INSERT INTO public.radio VALUES (17, '27', 'ASIGNADO', 'PROTECCION FISICA', 'PORTATIL', 'SUPERVISOR PFI', 'INVERSIONES PORCINAS C.A.', 'IP-03234', '442TKGS543', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'NNTN4497DR 1930 BT11', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '-SE PRESTO PROVISIONALMENTE A ALCABALA PRINCIPAL EN LOS CERRITO');
INSERT INTO public.radio VALUES (15, '23', 'ASIGNADO', 'ALCABALA HOTEL', 'PORTATIL', 'ALCABALA HOTEL', 'SERENOS ERM C.A.', 'IP-04061', '442TGYD952', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'NNTN4497DR 1930 BT21', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (8, '37', 'ASIGNADO', 'GRANJA URIMAN 2', 'PORTATIL', 'JOSE ESCALONA', 'SERENOS ERM C.A.', 'IP-04032', '442TJAE077', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'POR REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'por registrar el serial de la bateria.');
INSERT INTO public.radio VALUES (21, '38', 'ASIGNADO', 'GRANJA LA PARREÑA', 'PORTATIL', 'ALEJANDRO TURRA', 'INVERSIONES PORCINAS C.A.', 'IP-04082', 'D18TPM1820', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'D18TPM1820', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'ANTENA DETERIORADA PERO FUNCIONA');
INSERT INTO public.radio VALUES (10, 'PUNTO A PUNTO 1', 'ASIGNADO', 'GRANJA VILLA DE JULIA', 'PORTATIL', 'EDWIN PINTO', 'INVERSIONES PORCINAS C.A.', 'IP-04064', '158TKMU5035', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'POR REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'SERIAL DE BATERIA POR REGISTRAR');
INSERT INTO public.radio VALUES (23, '54', 'ASIGNADO', 'AGROPECUARIA LOS CERRITOS', 'PORTATIL', 'WILLIAM PEROJO', 'AGROPECUARIA LOS CERRITOS', 'IP-04085', '018TQM1368', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'NNTN4497CR 1644 BT11', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'SE USA CON LA CLAVE 48 EN LAS GUARDIAS EN AUSENCIA DEL RADIO CON CLAVE 48 FALTANTE');
INSERT INTO public.radio VALUES (25, '60', 'ASIGNADO', 'ALCABALA ROMANA IP', 'PORTATIL', 'INSPECTORES PFI', 'INVERSIONES PORCINAS C.A.', 'IP-04062', '442TKGS497', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'NNTN4970A 1720 AVFA', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (26, '63', 'ASIGNADO', 'CAAY - TALLER', 'PORTATIL', 'EMILIO REA', 'INVERSIONES PORCINAS C.A.', 'IP-04042', '442TJSF110', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'NNTN4970A 1327 AVCD', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'PERILLA DE VOLUMEN MORDIDA, EL CONECTOR DE LA BASE DEL CARGADOR TIENE JUEGO PARA ENCENDERLO');
INSERT INTO public.radio VALUES (27, '81', 'ASIGNADO', 'ALC. PPAL LA PARREÑA', 'PORTATIL', 'ALEJANDRO TURRA', 'INVERSIONES PORCINAS C.A.', 'IP-PENDIENTE', '672TGMB983', 'MOTOROLA', 'PRO 5150', 'OPERATIVO', 'HNN9008A 1911 AK29', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'BASE DEL CARGADOR ABIERTA, ASEGURADA CON ADHESIVO BLANCO');
INSERT INTO public.radio VALUES (24, '59', 'PENDIENTE PARA REPARACIÓN', 'CAAY - HDA. LA PARREÑA', 'PORTATIL', 'JESUS LOPEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04044', '188FYLA', 'MOTOROLA', 'RADIUS P110', 'DAÑADO', 'HNN148B 927 AUZ8*', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'DAÑADO', 'DAÑADO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'EL EQUIPO NO ENCIENDE.');
INSERT INTO public.radio VALUES (18, '29', 'ASIGNADO', 'PROTECCION FISICA', 'PORTATIL CON PANTALLA', 'EN SALA DE CONTROL', 'INVERSIONES PORCINAS C.A.', 'IP-04034', '018TMNJ913', 'MOTOROLA', 'EP-450S', 'OPERATIVO', 'NNTN4497DR 1930 BT21', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PERILLA DE CANALES PARTIDA, PERILLA DE VOLUMEN AGRIETADA');
INSERT INTO public.radio VALUES (28, 'PUNTO A PUNTO 2', 'ASIGNADO', 'GRANJA VILLA DE JULIA', 'PORTATIL', 'EDWIN PINTO', 'INVERSIONES PORCINAS C.A.', 'IP-04037', '158TKMU5120', 'MOTOROLA', 'EP-150', 'OPERATIVO', '150 JUJB', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'OPERATIVO', 'DAÑADO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'SE RECOGEN PARA EL RESGUARDO Y REVISIÓN EN SALA DE CONTROL');
INSERT INTO public.radio VALUES (46, 'PUNTO A PUNTO 8', 'ASIGNADO', 'CEAPOCA 1 - VIGILANCIA', 'PUNTO A PUNTO', 'RICARDO RODRIGUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04152', '158TKG2692', 'MOTOROLA', 'RADIUS', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (47, 'PUNTO A PUNTO 9', 'ASIGNADO', 'CEAPOCA 2 - VIGILANCIA', 'PUNTO A PUNTO', 'RICARDO RODRIGUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04153', '158TKMU5025', 'MOTOROLA', 'RADIUS', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (22, '48', 'ASIGNADO', 'GRANJA LOS CERRITOS 1', 'PORTATIL', 'REINALDO MARQUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04084', '018TQM0978', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'SIN REVISAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'SE LO LLEVARON (ROBARON) EN LA NOVEDAD DEL DIA 17-12-2019');
INSERT INTO public.radio VALUES (29, 'PUNTO A PUNTO 3', 'ASIGNADO', 'GRANJA VILLA DE JULIA', 'PORTATIL', 'EDWIN PINTO', 'INVERSIONES PORCINAS C.A.', 'IP-04033', '158TLK5134', 'MOTOROLA', 'RDU2020', 'OPERATIVO', '526 JUEB', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'OPERATIVO', 'DAÑADO', 'OPERATIVO', 'DAÑADO', 'OPERATIVO', 'OPERATIVO', 'SE RECOGEN PARA EL RESGUARDO Y REVISIÓN EN SALA DE CONTROL');
INSERT INTO public.radio VALUES (31, '25', 'ASIGNADO', 'SEGURIDAD INDUSTRIAL', 'PORTATIL', 'ROBERTH GONZALEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04035', '442THQ0914', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'NNTN4497DR', 'DAÑADO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'LA BATERIA NO DURA MUCHO TIEMPO CON CARGA');
INSERT INTO public.radio VALUES (30, '04', 'ASIGNADO', 'GCIA. PRODUCCION CERDOS', 'PORTATIL', 'HOBELLEIRO PARRA', 'INVERSIONES PORCINAS C.A.', 'IP-04057', '004TFL0631', 'MOTOROLA', 'PRO5150 Elite', 'OPERATIVO', 'POR REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (33, '30', 'ASIGNADO', 'PROTECCION FISICA', 'PORTATIL CON PANTALLA', 'PROTECCION FISICA', 'INVERSIONES PORCINAS C.A.', 'IP-04048', '0187MNJ871', 'MOTOROLA', 'EP-450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (34, '33', 'ASIGNADO', 'PRODUCCION CERDOS', 'PORTATIL', 'MARBELLA ESCALONA', 'INVERSIONES PORCINAS C.A.', 'IP-01877', '672THCS905', 'MOTOROLA', 'PRO5150', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'ANTENA REFORZADA CON TEIPE CELOVEN');
INSERT INTO public.radio VALUES (35, '43', 'ASIGNADO', 'GRANJA CEAPOCA', 'PORTATIL', 'RICARDO RODRIGUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04047', '018TPM1688', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (36, '05', 'ASIGNADO', 'PRODUCCION CERDOS', 'PORTATIL', 'RICARDO RODRIGUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04050', '442THAJ091', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (37, '50', 'ASIGNADO', 'CAAY - CAMPO', 'PORTATIL', 'FRANKLIN LUIS', 'AGRICOLA YARITAGUA', 'IP-04040', '442TFYE801', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (38, '53', 'ASIGNADO', 'CAAY - HDA. LAS VEGAS', 'PORTATIL', 'SIXTO ARROYO', 'AGRICOLA YARITAGUA', 'IP-04043', '188GHHA882', 'MOTOROLA', 'RADIUS P110', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (40, '62', 'ASIGNADO', 'CAAY - ADMINISTRACION', 'PORTATIL', 'NAIRELYS MORA', 'AGRICOLA YARITAGUA', 'IP-04041', '442TKLG634', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (41, '65', 'ASIGNADO', 'CAAY - CAMPO', 'PORTATIL', 'FRANKLIN LUIS', 'AGRICOLA YARITAGUA', 'IP-04146', '442TFWX197', 'MOTOROLA', 'EP-450', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'ANTENA NO ESTA EN BUENAS CONDICIONES');
INSERT INTO public.radio VALUES (42, '67', 'ASIGNADO', 'PROYECTOS', 'PORTATIL', 'ANTONIO VASQUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-03917', '018TPM1699', 'MOTOROLA', 'EP 450', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (43, 'PUNTO A PUNTO 4', 'ASIGNADO', 'MATACARMELERA - ENGORDE 1', 'PUNTO A PUNTO', 'RICARDO RODRIGUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04151', '158TKG8899', 'MOTOROLA', 'RADIUS', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (32, '3*', 'ASIGNADO', 'PROTECCION FISICA', 'PORTATIL', 'JONATHAN RIVERO', 'INVERSIONES PORCINAS C.A.', 'SIN IP-00001', '13U3563118', 'BAOFENG', 'UV-5R', 'OPERATIVO', 'POR REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (44, 'PUNTO APUNTO 6', 'ASIGNADO', 'MATACARMELERA - ENGORDE 1', 'PUNTO A PUNTO', 'RICARDO RODRIGUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04149', '158TKMU5165', 'MOTOROLA', 'RADIUS', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (45, 'PUNTO A PUNTO 7', 'ASIGNADO', 'MATACARMELERA - ENGORDE 2', 'PUNTO A PUNTO', 'RICARDO RODRIGUEZ', 'INVERSIONES PORCINAS C.A.', 'IP-04150', '158TKG8922', 'MOTOROLA', 'RADIUS', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');
INSERT INTO public.radio VALUES (50, 'INTERNO PLANTA - D003', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'OMAR PEREZ', 'INVERSIONES PORCINAS C.A.', 'IP-03527', '018TPES604', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (51, 'INTERNO PLANTA - D004', 'POR ASIGNAR', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'POR ASIGNAR', 'INVERSIONES PORCINAS C.A.', 'IP-03528', '018TPES587', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (49, 'INTERNO PLANTA - D002', 'POR ASIGNAR', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'POR ASIGNAR', 'INVERSIONES PORCINAS C.A.', 'IP-03518', '018TPES685', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (48, 'INTERNO PLANTA - D001', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'JOSE CEDRES', 'INVERSIONES PORCINAS C.A.', 'IP-03524', '018TPES594', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO CON DEFECTO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (52, 'INTERNO PLANTA - D005', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'EDGAR CAURO', 'INVERSIONES PORCINAS C.A.', 'IP-00000', '018TPES596', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (53, 'INTERNO PLANTA - D006', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'KENDRYS MENDEZ', 'INVERSIONES PORCINAS C.A.', 'IP-00003', '018TPES585', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (54, 'INTERNO PLANTA - D007', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'OSWALDO HEREDIA', 'INVERSIONES PORCINAS C.A.', 'IP-03525', '018TPES586', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (55, 'INTERNO PLANTA - D008', 'POR ASIGNAR', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'POR ASIGNAR', 'INVERSIONES PORCINAS C.A.', 'IP-03500', '018TPU1808', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (56, 'INTERNO PLANTA - D009', 'POR ASIGNAR', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'FRANFI SIERRA', 'INVERSIONES PORCINAS C.A.', 'IP-00004', '018TPES617', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (57, 'INTERNO PLANTA - D010', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'GUSTAVO GONZALES', 'INVERSIONES PORCINAS C.A.', 'IP-03523', '018TPES584', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (58, 'INTERNO PLANTA - D011', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'MARCIAL ASUAJE', 'INVERSIONES PORCINAS C.A.', 'IP-03503', '018TPUM420', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (59, 'INTERNO PLANTA - D012', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'EDGAR SALASAR', 'INVERSIONES PORCINAS C.A.', 'IP-03526', '018TPES684', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (60, '06', 'POR ASIGNAR', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'POR ASIGNAR', 'INVERSIONES PORCINAS C.A.', 'IP-03502', '018TPUM429', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (61, 'INTERNO PLANTA - D014', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'EDGAR PENA', 'INVERSIONES PORCINAS C.A.', 'IP-03501', '018TPUN337', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (62, 'INTERNO PLANTA - D015', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'KRISTIAN SEQUERA', 'INVERSIONES PORCINAS C.A.', 'IP-03499', '018TPU1804', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (63, 'INTERNO PLANTA - D016', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'RAFAEL MORA', 'INVERSIONES PORCINAS C.A.', 'IP-03833', '1338QN4828', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (64, 'INTERNO PLANTA - D017', 'ASIGNADO', 'PLANTA DE ALIMENTOS', 'PUNTO A PUNTO', 'PANEL DE CONTROL', 'INVERSIONES PORCINAS C.A.', 'IP-03834', '1338QN2491', 'MOTOROLA', 'EP 450S', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'PENDIENTE ACTA');
INSERT INTO public.radio VALUES (39, '58', 'ASIGNADO', 'HACIENDA LA ESMERALDA', 'PUNTO A PUNTO', 'LESLIE MEDINA', 'AGRICOLA YARITAGUA', 'SIN IP-1', '188TXS2690', 'MOTOROLA', 'RADIUS', 'OPERATIVO', 'SIN REGISTRAR', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', 'OPERATIVO', '');


--
-- Data for Name: reporte_radio; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: robo_cerdo; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario VALUES (1, 'ippfi711', '1234', 'Alvaro', 'Tirado', '20350027', 'atirado@inporca.com');
INSERT INTO public.usuario VALUES (6, 'ippfi710', '$2y$10$hfy9Wb8hupv4vd1uC4h.nOmxDhEjkZdfAOixQwhpPUhoGyZ7/KhMm', 'Alvaro', 'Tirado', '20350028', 'alvaro027@gmail.com');
INSERT INTO public.usuario VALUES (7, 'guedezale', '$2y$10$T0Dt86GhEUwEv6REkuAG9e.m5GYopqycHqQGWhRkdZiL8HMUf4KxS', 'Alejandro', 'Guedez', '25544458', 'guye@gmail.com');
INSERT INTO public.usuario VALUES (9, 'evenegas', '$2y$10$UF22K8PdDo5fR11dR6GtmOCP0HSqNJQK925MW5A9t7zQ5TjYBOIKa', 'Eduardo', 'Venegas', '11111111', 'ee@inporca');


--
-- Data for Name: usuario_permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario_permiso VALUES (1, 1);


--
-- Name: bitacora_id_bitacora_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bitacora_id_bitacora_seq', 1, false);


--
-- Name: novedades_id_novedades_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.novedades_id_novedades_seq', 1, false);


--
-- Name: permisos_id_permiso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permisos_id_permiso_seq', 1, true);


--
-- Name: radio_id_radio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.radio_id_radio_seq', 64, true);


--
-- Name: reporte_radio_id_reporte_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reporte_radio_id_reporte_seq', 1, false);


--
-- Name: robo_cerdo_id_robo_cerdo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.robo_cerdo_id_robo_cerdo_seq', 1, false);


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_usuario_seq', 9, true);


--
-- Name: bitacora bitacora_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT bitacora_pkey PRIMARY KEY (id_bitacora);


--
-- Name: novedades novedades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.novedades
    ADD CONSTRAINT novedades_pkey PRIMARY KEY (id_novedades);


--
-- Name: permisos permisos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permisos
    ADD CONSTRAINT permisos_pkey PRIMARY KEY (id_permiso);


--
-- Name: usuario_permiso pk_usuario_permiso; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT pk_usuario_permiso PRIMARY KEY (id_usuario, id_permiso);


--
-- Name: radio radio_codigo_ip_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.radio
    ADD CONSTRAINT radio_codigo_ip_key UNIQUE (codigo_ip);


--
-- Name: radio radio_codigo_usuario_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.radio
    ADD CONSTRAINT radio_codigo_usuario_key UNIQUE (codigo_usuario);


--
-- Name: radio radio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.radio
    ADD CONSTRAINT radio_pkey PRIMARY KEY (id_radio);


--
-- Name: radio radio_serial_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.radio
    ADD CONSTRAINT radio_serial_key UNIQUE (serial);


--
-- Name: reporte_radio reporte_radio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_radio
    ADD CONSTRAINT reporte_radio_pkey PRIMARY KEY (id_reporte);


--
-- Name: robo_cerdo robo_cerdo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.robo_cerdo
    ADD CONSTRAINT robo_cerdo_pkey PRIMARY KEY (id_robo_cerdo);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: usuario usuario_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_username_key UNIQUE (username);


--
-- Name: bitacora bitacora_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitacora
    ADD CONSTRAINT bitacora_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: usuario_permiso fk_id_permiso_permiso; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT fk_id_permiso_permiso FOREIGN KEY (id_permiso) REFERENCES public.permisos(id_permiso) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: usuario_permiso fk_id_usuario_usuario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_permiso
    ADD CONSTRAINT fk_id_usuario_usuario FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: novedades novedades_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.novedades
    ADD CONSTRAINT novedades_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: reporte_radio reporte_radio_codigo_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_radio
    ADD CONSTRAINT reporte_radio_codigo_usuario_fkey FOREIGN KEY (codigo_usuario) REFERENCES public.radio(codigo_usuario) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: reporte_radio reporte_radio_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reporte_radio
    ADD CONSTRAINT reporte_radio_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id_usuario) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: robo_cerdo robo_cerdo_id_novedades_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.robo_cerdo
    ADD CONSTRAINT robo_cerdo_id_novedades_fkey FOREIGN KEY (id_novedades) REFERENCES public.novedades(id_novedades) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM ippfi710;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

