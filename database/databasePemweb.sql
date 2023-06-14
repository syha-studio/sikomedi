/*==============================================================*/
/* DBMS name:      ORACLE Version 11g                           */
/* Created on:     11/06/2023 08:46:57                          */
/*==============================================================*/

/*==============================================================*/
/* Table: JENIS_KONTEN                                          */
/*==============================================================*/
create table JENIS_KONTEN 
(
   ID                   int                  not null,
   NAMA                 varchar(20),
   constraint PK_JENIS_KONTEN primary key (ID)
);

/*==============================================================*/
/* Table: JENIS_USER                                            */
/*==============================================================*/
create table JENIS_USER 
(
   ID                   int                  not null,
   NAMA                 varchar(10),
   constraint PK_JENIS_USER primary key (ID)
);

/*==============================================================*/
/* Table: KONTEN_HISTORY                                        */
/*==============================================================*/
create table KONTEN_HISTORY 
(
   ID                   int                  not null,
   USER_ID              int,
   MEDIA_ID             int,
   TANGGALPOSTING       date,
   JUDULPOSTING         varchar(50),
   JENIS_ID             int,
   LINKKONTEN           varchar(200),
   CAPTION              varchar(1000),
   STATUS_ID            int,
   constraint PK_KONTEN_HISTORY primary key (ID)
);

/*==============================================================*/
/* Table: MEDIA                                                 */
/*==============================================================*/
create table MEDIA 
(
   ID                   int                  not null,
   NAMA                 varchar(50),
   LINK                 varchar(200),
   constraint PK_MEDIA primary key (ID)
);

/*==============================================================*/
/* Table: STATUS_KONTEN                                         */
/*==============================================================*/
create table STATUS_KONTEN 
(
   ID                   int                  not null,
   NAMA                 varchar(10),
   constraint PK_STATUS_KONTEN primary key (ID)
);

/*==============================================================*/
/* Table: STATUS_USER                                           */
/*==============================================================*/
create table STATUS_USER 
(
   ID                   int,
   NAMA                 varchar(10)
);

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS 
(
   ID                   INT                  not null,
   NAME                 VARCHAR(100)         not null,
   PASSWORD             Varchar(100)         not null,
   EMAIL                VARCHAR(100)         not null,
   NOHP                 varchar(20),
   JENIS_ID             int,
   STATUS_ID            int,
   constraint PK_USERS primary key (ID, NAME)
);

