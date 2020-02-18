/*
Created		7/02/2020
Modified		7/02/2020
Project		
Model			
Company		
Author		
Version		
Database		MS SQL 2005 
*/






















Create table [Departamento]
(
	[idDepto] Integer Identity(1,1) NOT NULL, UNIQUE ([idDepto]),
	[Nombre] Varbinary(50) NULL,
	[ext] Bigint NULL,
Primary Key ([idDepto])
) 
go

Create table [personas]
(
	[idPersona] Integer Identity(1,1) NOT NULL, UNIQUE ([idPersona]),
	[idDepto] Integer NOT NULL,
	[dpi] Bigint NULL,
	[nombre] Varbinary(50) NULL,
	[apellido] Varbinary(50) NULL,
	[apellido2] Varchar(50) NULL,
	[telefono] Bigint NULL,
	[area] Bigint NULL,
	[jefe] Varchar(50) NULL,
	[estado] Bit NULL,
Primary Key ([idPersona])
) 
go

Create table [Vehiculos]
(
	[idVehiculo] Integer Identity(1,1) NOT NULL, UNIQUE ([idVehiculo]),
	[marca] Varchar(50) NULL,
	[modelo] Varchar(50) NULL,
	[placa] Varchar(50) NULL,
	[color] Varchar(50) NULL,
	[foto] Varchar(200) NULL,
	[placaextranjera] Bit NULL,
	[fecha] Datetime NULL,
	[estado] Bit NULL,
	[correlativo] Bigint NULL,
	[idPersona] Integer NOT NULL,
Primary Key ([idVehiculo])
) 
go

Create table [faltas]
(
	[idFalta] Integer Identity(1,1) NOT NULL, UNIQUE ([idFalta]),
	[falta] Text NULL,
	[foto] Varchar(250) NULL,
	[fecha] Datetime NULL,
	[idVehiculo] Integer NOT NULL,
Primary Key ([idFalta])
) 
go















Alter table [personas] add  foreign key([idDepto]) references [Departamento] ([idDepto])  on update no action on delete no action 
go
Alter table [Vehiculos] add  foreign key([idPersona]) references [personas] ([idPersona])  on update no action on delete no action 
go
Alter table [faltas] add  foreign key([idVehiculo]) references [Vehiculos] ([idVehiculo])  on update no action on delete no action 
go


Set quoted_identifier on
go









Set quoted_identifier off
go





