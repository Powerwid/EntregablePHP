PGDMP                      }         
   entregable    17.5    17.5 4    Y           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            Z           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            [           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            \           1262    32768 
   entregable    DATABASE     p   CREATE DATABASE entregable WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'es-MX';
    DROP DATABASE entregable;
                     postgres    false            �            1255    32840 %   eliminar_asignacion_proyecto(integer) 	   PROCEDURE     �   CREATE PROCEDURE public.eliminar_asignacion_proyecto(IN p_id_asignacion integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    DELETE FROM Asignaciones_Proyectos WHERE id_asignacion = p_id_asignacion;
END;
$$;
 P   DROP PROCEDURE public.eliminar_asignacion_proyecto(IN p_id_asignacion integer);
       public               postgres    false            �            1255    32835    eliminar_cliente(integer) 	   PROCEDURE     �   CREATE PROCEDURE public.eliminar_cliente(IN p_id_cliente integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    DELETE FROM Clientes WHERE id_cliente = p_id_cliente;
END;
$$;
 A   DROP PROCEDURE public.eliminar_cliente(IN p_id_cliente integer);
       public               postgres    false            �            1255    32838    eliminar_proyecto(integer) 	   PROCEDURE     �   CREATE PROCEDURE public.eliminar_proyecto(IN p_id_proyecto integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    DELETE FROM Proyectos WHERE id_proyecto = p_id_proyecto;
END;
$$;
 C   DROP PROCEDURE public.eliminar_proyecto(IN p_id_proyecto integer);
       public               postgres    false            �            1255    32832    eliminar_usuario(integer) 	   PROCEDURE     �   CREATE PROCEDURE public.eliminar_usuario(IN p_id_usuario integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
    DELETE FROM Usuarios WHERE id_usuario = p_id_usuario;
END;
$$;
 A   DROP PROCEDURE public.eliminar_usuario(IN p_id_usuario integer);
       public               postgres    false            �            1255    32839 @   guardar_asignacion_proyecto(integer, integer, character varying) 	   PROCEDURE     L  CREATE PROCEDURE public.guardar_asignacion_proyecto(IN p_id_proyecto integer, IN p_id_usuario integer, IN p_rol_en_proyecto character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO Asignaciones_Proyectos (id_proyecto, id_usuario, rol_en_proyecto)
    VALUES (p_id_proyecto, p_id_usuario, p_rol_en_proyecto);
END;
$$;
 �   DROP PROCEDURE public.guardar_asignacion_proyecto(IN p_id_proyecto integer, IN p_id_usuario integer, IN p_rol_en_proyecto character varying);
       public               postgres    false            �            1255    32833 N   guardar_cliente(character varying, character varying, character varying, text) 	   PROCEDURE     [  CREATE PROCEDURE public.guardar_cliente(IN p_nombre_empresa character varying, IN p_correo character varying, IN p_telefono character varying, IN p_direccion text)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO Clientes (nombre_empresa, correo, telefono, direccion)
    VALUES (p_nombre_empresa, p_correo, p_telefono, p_direccion);
END;
$$;
 �   DROP PROCEDURE public.guardar_cliente(IN p_nombre_empresa character varying, IN p_correo character varying, IN p_telefono character varying, IN p_direccion text);
       public               postgres    false            �            1255    32836 Q   guardar_proyecto(integer, character varying, text, date, date, character varying) 	   PROCEDURE     �  CREATE PROCEDURE public.guardar_proyecto(IN p_id_cliente integer, IN p_nombre_proyecto character varying, IN p_descripcion text, IN p_fecha_inicio date, IN p_fecha_fin date, IN p_estado character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO Proyectos (id_cliente, nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado)
    VALUES (p_id_cliente, p_nombre_proyecto, p_descripcion, p_fecha_inicio, p_fecha_fin, p_estado);
END;
$$;
 �   DROP PROCEDURE public.guardar_proyecto(IN p_id_cliente integer, IN p_nombre_proyecto character varying, IN p_descripcion text, IN p_fecha_inicio date, IN p_fecha_fin date, IN p_estado character varying);
       public               postgres    false            �            1255    32830 n   guardar_usuario(character varying, character varying, character varying, character varying, character varying) 	   PROCEDURE     {  CREATE PROCEDURE public.guardar_usuario(IN p_correo character varying, IN p_contrasena character varying, IN p_nombre character varying, IN p_apellido character varying, IN p_rol character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    INSERT INTO Usuarios (correo, contrasena, nombre, apellido, rol)
    VALUES (p_correo, p_contrasena, p_nombre, p_apellido, p_rol);
END;
$$;
 �   DROP PROCEDURE public.guardar_usuario(IN p_correo character varying, IN p_contrasena character varying, IN p_nombre character varying, IN p_apellido character varying, IN p_rol character varying);
       public               postgres    false            �            1255    32834 Y   modificar_cliente(integer, character varying, character varying, character varying, text) 	   PROCEDURE     �  CREATE PROCEDURE public.modificar_cliente(IN p_id_cliente integer, IN p_nombre_empresa character varying, IN p_correo character varying, IN p_telefono character varying, IN p_direccion text)
    LANGUAGE plpgsql
    AS $$
BEGIN
    UPDATE Clientes 
    SET nombre_empresa = p_nombre_empresa,
        correo = p_correo,
        telefono = p_telefono,
        direccion = p_direccion
    WHERE id_cliente = p_id_cliente;
END;
$$;
 �   DROP PROCEDURE public.modificar_cliente(IN p_id_cliente integer, IN p_nombre_empresa character varying, IN p_correo character varying, IN p_telefono character varying, IN p_direccion text);
       public               postgres    false            �            1255    32837 \   modificar_proyecto(integer, integer, character varying, text, date, date, character varying) 	   PROCEDURE     +  CREATE PROCEDURE public.modificar_proyecto(IN p_id_proyecto integer, IN p_id_cliente integer, IN p_nombre_proyecto character varying, IN p_descripcion text, IN p_fecha_inicio date, IN p_fecha_fin date, IN p_estado character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    UPDATE Proyectos 
    SET id_cliente = p_id_cliente,
        nombre_proyecto = p_nombre_proyecto,
        descripcion = p_descripcion,
        fecha_inicio = p_fecha_inicio,
        fecha_fin = p_fecha_fin,
        estado = p_estado
    WHERE id_proyecto = p_id_proyecto;
END;
$$;
 �   DROP PROCEDURE public.modificar_proyecto(IN p_id_proyecto integer, IN p_id_cliente integer, IN p_nombre_proyecto character varying, IN p_descripcion text, IN p_fecha_inicio date, IN p_fecha_fin date, IN p_estado character varying);
       public               postgres    false            �            1255    32831 y   modificar_usuario(integer, character varying, character varying, character varying, character varying, character varying) 	   PROCEDURE     �  CREATE PROCEDURE public.modificar_usuario(IN p_id_usuario integer, IN p_correo character varying, IN p_contrasena character varying, IN p_nombre character varying, IN p_apellido character varying, IN p_rol character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    UPDATE Usuarios 
    SET correo = p_correo,
        contrasena = p_contrasena,
        nombre = p_nombre,
        apellido = p_apellido,
        rol = p_rol
    WHERE id_usuario = p_id_usuario;
END;
$$;
 �   DROP PROCEDURE public.modificar_usuario(IN p_id_usuario integer, IN p_correo character varying, IN p_contrasena character varying, IN p_nombre character varying, IN p_apellido character varying, IN p_rol character varying);
       public               postgres    false            �            1255    32842 )   obtener_asignaciones_por_usuario(integer)    FUNCTION     �  CREATE FUNCTION public.obtener_asignaciones_por_usuario(p_id_usuario integer) RETURNS TABLE(id_proyecto integer, nombre_proyecto character varying, nombre_usuario character varying, rol_en_proyecto character varying, fecha_asignacion timestamp without time zone)
    LANGUAGE plpgsql
    AS $$
BEGIN
    RETURN QUERY
    SELECT 
        p.id_proyecto,
        p.nombre_proyecto,
        CONCAT(u.nombre, ' ', u.apellido) AS nombre_usuario,
        ap.rol_en_proyecto,
        ap.fecha_asignacion
    FROM Asignaciones_Proyectos ap
    JOIN Proyectos p ON ap.id_proyecto = p.id_proyecto
    JOIN Usuarios u ON ap.id_usuario = u.id_usuario
    WHERE ap.id_usuario = p_id_usuario;
END;
$$;
 M   DROP FUNCTION public.obtener_asignaciones_por_usuario(p_id_usuario integer);
       public               postgres    false            �            1255    32841 &   obtener_proyectos_por_cliente(integer)    FUNCTION     F  CREATE FUNCTION public.obtener_proyectos_por_cliente(p_id_cliente integer) RETURNS TABLE(id_proyecto integer, nombre_proyecto character varying, nombre_cliente character varying, fecha_inicio date, fecha_fin date, estado character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    RETURN QUERY
    SELECT 
        p.id_proyecto,
        p.nombre_proyecto,
        c.nombre_empresa AS nombre_cliente,
        p.fecha_inicio,
        p.fecha_fin,
        p.estado
    FROM Proyectos p
    JOIN Clientes c ON p.id_cliente = c.id_cliente
    WHERE p.id_cliente = p_id_cliente;
END;
$$;
 J   DROP FUNCTION public.obtener_proyectos_por_cliente(p_id_cliente integer);
       public               postgres    false            �            1255    32843 .   obtener_proyectos_por_rango_fechas(date, date)    FUNCTION     v  CREATE FUNCTION public.obtener_proyectos_por_rango_fechas(p_fecha_inicio date, p_fecha_fin date) RETURNS TABLE(id_proyecto integer, nombre_proyecto character varying, nombre_cliente character varying, fecha_inicio date, fecha_fin date, estado character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    RETURN QUERY
    SELECT 
        p.id_proyecto,
        p.nombre_proyecto,
        c.nombre_empresa AS nombre_cliente,
        p.fecha_inicio,
        p.fecha_fin,
        p.estado
    FROM Proyectos p
    JOIN Clientes c ON p.id_cliente = c.id_cliente
    WHERE p.fecha_inicio BETWEEN p_fecha_inicio AND p_fecha_fin;
END;
$$;
 `   DROP FUNCTION public.obtener_proyectos_por_rango_fechas(p_fecha_inicio date, p_fecha_fin date);
       public               postgres    false            �            1259    32811    asignaciones_proyectos    TABLE       CREATE TABLE public.asignaciones_proyectos (
    id_asignacion integer NOT NULL,
    id_proyecto integer NOT NULL,
    id_usuario integer NOT NULL,
    rol_en_proyecto character varying(50),
    fecha_asignacion timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
 *   DROP TABLE public.asignaciones_proyectos;
       public         heap r       postgres    false            �            1259    32810 (   asignaciones_proyectos_id_asignacion_seq    SEQUENCE     �   CREATE SEQUENCE public.asignaciones_proyectos_id_asignacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.asignaciones_proyectos_id_asignacion_seq;
       public               postgres    false    224            ]           0    0 (   asignaciones_proyectos_id_asignacion_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.asignaciones_proyectos_id_asignacion_seq OWNED BY public.asignaciones_proyectos.id_asignacion;
          public               postgres    false    223            �            1259    32783    clientes    TABLE     $  CREATE TABLE public.clientes (
    id_cliente integer NOT NULL,
    nombre_empresa character varying(100) NOT NULL,
    correo character varying(255) NOT NULL,
    telefono character varying(20),
    direccion text,
    fecha_creacion timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);
    DROP TABLE public.clientes;
       public         heap r       postgres    false            �            1259    32782    clientes_id_cliente_seq    SEQUENCE     �   CREATE SEQUENCE public.clientes_id_cliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.clientes_id_cliente_seq;
       public               postgres    false    220            ^           0    0    clientes_id_cliente_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.clientes_id_cliente_seq OWNED BY public.clientes.id_cliente;
          public               postgres    false    219            �            1259    32795 	   proyectos    TABLE       CREATE TABLE public.proyectos (
    id_proyecto integer NOT NULL,
    id_cliente integer NOT NULL,
    nombre_proyecto character varying(100) NOT NULL,
    descripcion text,
    fecha_inicio date NOT NULL,
    fecha_fin date,
    estado character varying(20) NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT proyectos_estado_check CHECK (((estado)::text = ANY ((ARRAY['pendiente'::character varying, 'en_progreso'::character varying, 'completado'::character varying])::text[])))
);
    DROP TABLE public.proyectos;
       public         heap r       postgres    false            �            1259    32794    proyectos_id_proyecto_seq    SEQUENCE     �   CREATE SEQUENCE public.proyectos_id_proyecto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.proyectos_id_proyecto_seq;
       public               postgres    false    222            _           0    0    proyectos_id_proyecto_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.proyectos_id_proyecto_seq OWNED BY public.proyectos.id_proyecto;
          public               postgres    false    221            �            1259    32770    usuarios    TABLE     �  CREATE TABLE public.usuarios (
    id_usuario integer NOT NULL,
    correo character varying(255) NOT NULL,
    contrasena character varying(255) NOT NULL,
    nombre character varying(50) NOT NULL,
    apellido character varying(50) NOT NULL,
    rol character varying(20) NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT usuarios_rol_check CHECK (((rol)::text = ANY ((ARRAY['admin'::character varying, 'empleado'::character varying])::text[])))
);
    DROP TABLE public.usuarios;
       public         heap r       postgres    false            �            1259    32769    usuarios_id_usuario_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.usuarios_id_usuario_seq;
       public               postgres    false    218            `           0    0    usuarios_id_usuario_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;
          public               postgres    false    217            �           2604    32814 $   asignaciones_proyectos id_asignacion    DEFAULT     �   ALTER TABLE ONLY public.asignaciones_proyectos ALTER COLUMN id_asignacion SET DEFAULT nextval('public.asignaciones_proyectos_id_asignacion_seq'::regclass);
 S   ALTER TABLE public.asignaciones_proyectos ALTER COLUMN id_asignacion DROP DEFAULT;
       public               postgres    false    224    223    224            �           2604    32786    clientes id_cliente    DEFAULT     z   ALTER TABLE ONLY public.clientes ALTER COLUMN id_cliente SET DEFAULT nextval('public.clientes_id_cliente_seq'::regclass);
 B   ALTER TABLE public.clientes ALTER COLUMN id_cliente DROP DEFAULT;
       public               postgres    false    219    220    220            �           2604    32798    proyectos id_proyecto    DEFAULT     ~   ALTER TABLE ONLY public.proyectos ALTER COLUMN id_proyecto SET DEFAULT nextval('public.proyectos_id_proyecto_seq'::regclass);
 D   ALTER TABLE public.proyectos ALTER COLUMN id_proyecto DROP DEFAULT;
       public               postgres    false    221    222    222            �           2604    32773    usuarios id_usuario    DEFAULT     z   ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);
 B   ALTER TABLE public.usuarios ALTER COLUMN id_usuario DROP DEFAULT;
       public               postgres    false    217    218    218            V          0    32811    asignaciones_proyectos 
   TABLE DATA           {   COPY public.asignaciones_proyectos (id_asignacion, id_proyecto, id_usuario, rol_en_proyecto, fecha_asignacion) FROM stdin;
    public               postgres    false    224   �Z       R          0    32783    clientes 
   TABLE DATA           k   COPY public.clientes (id_cliente, nombre_empresa, correo, telefono, direccion, fecha_creacion) FROM stdin;
    public               postgres    false    220   F[       T          0    32795 	   proyectos 
   TABLE DATA           �   COPY public.proyectos (id_proyecto, id_cliente, nombre_proyecto, descripcion, fecha_inicio, fecha_fin, estado, fecha_creacion) FROM stdin;
    public               postgres    false    222   �[       P          0    32770    usuarios 
   TABLE DATA           i   COPY public.usuarios (id_usuario, correo, contrasena, nombre, apellido, rol, fecha_creacion) FROM stdin;
    public               postgres    false    218   \       a           0    0 (   asignaciones_proyectos_id_asignacion_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.asignaciones_proyectos_id_asignacion_seq', 1, true);
          public               postgres    false    223            b           0    0    clientes_id_cliente_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.clientes_id_cliente_seq', 1, true);
          public               postgres    false    219            c           0    0    proyectos_id_proyecto_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.proyectos_id_proyecto_seq', 1, true);
          public               postgres    false    221            d           0    0    usuarios_id_usuario_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 6, true);
          public               postgres    false    217            �           2606    32819 H   asignaciones_proyectos asignaciones_proyectos_id_proyecto_id_usuario_key 
   CONSTRAINT     �   ALTER TABLE ONLY public.asignaciones_proyectos
    ADD CONSTRAINT asignaciones_proyectos_id_proyecto_id_usuario_key UNIQUE (id_proyecto, id_usuario);
 r   ALTER TABLE ONLY public.asignaciones_proyectos DROP CONSTRAINT asignaciones_proyectos_id_proyecto_id_usuario_key;
       public                 postgres    false    224    224            �           2606    32817 2   asignaciones_proyectos asignaciones_proyectos_pkey 
   CONSTRAINT     {   ALTER TABLE ONLY public.asignaciones_proyectos
    ADD CONSTRAINT asignaciones_proyectos_pkey PRIMARY KEY (id_asignacion);
 \   ALTER TABLE ONLY public.asignaciones_proyectos DROP CONSTRAINT asignaciones_proyectos_pkey;
       public                 postgres    false    224            �           2606    32793    clientes clientes_correo_key 
   CONSTRAINT     Y   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_correo_key UNIQUE (correo);
 F   ALTER TABLE ONLY public.clientes DROP CONSTRAINT clientes_correo_key;
       public                 postgres    false    220            �           2606    32791    clientes clientes_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id_cliente);
 @   ALTER TABLE ONLY public.clientes DROP CONSTRAINT clientes_pkey;
       public                 postgres    false    220            �           2606    32804    proyectos proyectos_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.proyectos
    ADD CONSTRAINT proyectos_pkey PRIMARY KEY (id_proyecto);
 B   ALTER TABLE ONLY public.proyectos DROP CONSTRAINT proyectos_pkey;
       public                 postgres    false    222            �           2606    32781    usuarios usuarios_correo_key 
   CONSTRAINT     Y   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_correo_key UNIQUE (correo);
 F   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_correo_key;
       public                 postgres    false    218            �           2606    32779    usuarios usuarios_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public                 postgres    false    218            �           2606    32820 >   asignaciones_proyectos asignaciones_proyectos_id_proyecto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.asignaciones_proyectos
    ADD CONSTRAINT asignaciones_proyectos_id_proyecto_fkey FOREIGN KEY (id_proyecto) REFERENCES public.proyectos(id_proyecto) ON DELETE CASCADE;
 h   ALTER TABLE ONLY public.asignaciones_proyectos DROP CONSTRAINT asignaciones_proyectos_id_proyecto_fkey;
       public               postgres    false    222    224    4790            �           2606    32825 =   asignaciones_proyectos asignaciones_proyectos_id_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.asignaciones_proyectos
    ADD CONSTRAINT asignaciones_proyectos_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id_usuario) ON DELETE CASCADE;
 g   ALTER TABLE ONLY public.asignaciones_proyectos DROP CONSTRAINT asignaciones_proyectos_id_usuario_fkey;
       public               postgres    false    4784    224    218            �           2606    32805 #   proyectos proyectos_id_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.proyectos
    ADD CONSTRAINT proyectos_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.clientes(id_cliente) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.proyectos DROP CONSTRAINT proyectos_id_cliente_fkey;
       public               postgres    false    222    220    4788            V   :   x�3�4B���Ģ����Ĕ�"N##S]S]#+c+S=s###c3�=... [��      R   _   x�3�IM����)M���K-�L��L�+Iu(������s9��ML��-,9�srR�|N##S]S]#+c+S=s###c3�=... <��      T   X   x�3�4�(ʯLM.�W0�tI-N,*����W(OM�4202�5 "C(��L͋/(�O/J-·�0�P00�26�21�372226����� �<�      P   �  x����o�0�3�9�Z��m~��R�� i�i����$�0�뷴�4�Ӷ��'Y���j������J5J�y�*���o?Y���"&YU�~��
YV�� r����p)r]����Y݊��_'�Q?�`<;�4z��%��� ��<�D�[�&&nI��p=Y�MV��d󹋵�jx����,���1v����[�J�d�סՙ�9ςn��<���r�����K�J^���<�(?���v|�.��c"�A �0m˚���a/9�F�y-�	xj�+�Y]*��8�.��}�m�`#�Á_G��?n%��-���g�R��Q�ɤ& ��n��{#���?6���O�I8�Bg����e�$��K
\ւ�B��q<BhC@l�����w�黗     