USE [CLINICA]
GO

/****** Object:  Table [dbo].[PW_Buzon_Sugerencias]    Script Date: 02/03/2021 15:29:06 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[PW_Buzon_Sugerencias](
	[Secuencia] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [datetime] NOT NULL,
	[hora] [datetime] NOT NULL,
	[nombres] [varchar](30) NOT NULL,
	[n_dni] [varchar](20) NULL,
	[edad] [int] NOT NULL,
	[celular] [varchar](25) NULL,
	[email] [varchar](40) NULL,
	[Direccion] [varchar](50) NULL,
	[Distrito] [varchar](50) NULL,
	[condicion] [varchar](20) NOT NULL,
	[tipo_paciente] [varchar](20) NOT NULL,
	[motivo] [varchar](500) NULL,
	[observacion] [varchar](500) NULL,
	[flagdatos] [bit] NOT NULL,
	[flagley] [bit] NOT NULL,
 CONSTRAINT [PK_Buzon_Sugerencias] PRIMARY KEY CLUSTERED 
(
	[Secuencia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO


