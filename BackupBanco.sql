-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dbhhealth
-- ------------------------------------------------------
-- Server version	5.6.10-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pagina_ambiente`
--

DROP TABLE IF EXISTS `pagina_ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_ambiente` (
  `idPaginaAmbiente` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `fotoPrincipal` text NOT NULL,
  `textoFoto` varchar(255) NOT NULL,
  `idRodape` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  PRIMARY KEY (`idPaginaAmbiente`),
  KEY `fk_amb_men_idx` (`idMenu`),
  KEY `fk_amb_rod_idx` (`idRodape`),
  CONSTRAINT `fk_amb_men` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_amb_rod` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_ambiente`
--

LOCK TABLES `pagina_ambiente` WRITE;
/*!40000 ALTER TABLE `pagina_ambiente` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_contato`
--

DROP TABLE IF EXISTS `pagina_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_contato` (
  `idPaginaContato` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `fotoPrincipal` varchar(255) NOT NULL,
  `tituloPagina` varchar(255) NOT NULL,
  `textoIntroducao` varchar(255) NOT NULL,
  `idRodape` int(11) NOT NULL,
  PRIMARY KEY (`idPaginaContato`),
  KEY `fk_cont_men_idx` (`idMenu`),
  KEY `fk_cont_rod_idx` (`idRodape`),
  CONSTRAINT `fk_cont_men` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_cont_rod` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_contato`
--

LOCK TABLES `pagina_contato` WRITE;
/*!40000 ALTER TABLE `pagina_contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_convenio`
--

DROP TABLE IF EXISTS `pagina_convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_convenio` (
  `idPaginaConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `fotoPrincipal` varchar(255) NOT NULL,
  `tituloPagina` varchar(255) NOT NULL,
  `idRodape` int(11) NOT NULL,
  PRIMARY KEY (`idPaginaConvenio`),
  KEY `fk_conv_men_idx` (`idMenu`),
  KEY `fk_conv_rod_idx` (`idRodape`),
  CONSTRAINT `fk_conv_men` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_conv_rod` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_convenio`
--

LOCK TABLES `pagina_convenio` WRITE;
/*!40000 ALTER TABLE `pagina_convenio` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_home`
--

DROP TABLE IF EXISTS `pagina_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_home` (
  `idPaginaHome` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `fotoMissao` varchar(45) NOT NULL,
  `fotoVisao` varchar(45) NOT NULL,
  `fotoValores` varchar(45) NOT NULL,
  `textoMissao` varchar(45) NOT NULL,
  `textoVisao` varchar(45) NOT NULL,
  `textoValores` varchar(45) NOT NULL,
  `fotoFundo` varchar(255) NOT NULL,
  `idUnidade` int(11) NOT NULL,
  `idRodape` int(11) NOT NULL,
  PRIMARY KEY (`idPaginaHome`),
  KEY `fk_home_menu_idx` (`idMenu`),
  KEY `fk_home_rodape_idx` (`idRodape`),
  CONSTRAINT `fk_home_menu` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_home_rodape` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_home`
--

LOCK TABLES `pagina_home` WRITE;
/*!40000 ALTER TABLE `pagina_home` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_info_usuario`
--

DROP TABLE IF EXISTS `pagina_info_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_info_usuario` (
  `idPaginaInfoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) DEFAULT NULL,
  `fotoAssunto` varchar(255) DEFAULT NULL,
  `textoAssunto` text NOT NULL,
  `ativo` int(1) DEFAULT NULL,
  `idRodape` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPaginaInfoUsuario`),
  KEY `fk_info_user_menu_idx` (`idMenu`),
  KEY `fk_info_user_rodape_idx` (`idRodape`),
  CONSTRAINT `fk_info_user_menu` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_info_user_rodape` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_info_usuario`
--

LOCK TABLES `pagina_info_usuario` WRITE;
/*!40000 ALTER TABLE `pagina_info_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_info_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_informacao`
--

DROP TABLE IF EXISTS `pagina_informacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_informacao` (
  `idInformacao` int(11) NOT NULL AUTO_INCREMENT,
  `fotoPrincipal` varchar(255) DEFAULT NULL,
  `tituloPagina` varchar(255) NOT NULL,
  `textoIntroducao` text NOT NULL,
  `fotoAssunto` varchar(255) DEFAULT NULL,
  `textoAssunto` text NOT NULL,
  PRIMARY KEY (`idInformacao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_informacao`
--

LOCK TABLES `pagina_informacao` WRITE;
/*!40000 ALTER TABLE `pagina_informacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_informacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_procedimento_exame`
--

DROP TABLE IF EXISTS `pagina_procedimento_exame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_procedimento_exame` (
  `idPaginaProcedimento` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) DEFAULT NULL,
  `fotoProcedimento` varchar(255) DEFAULT NULL,
  `textoProcedimento` text,
  `ativo` int(1) DEFAULT NULL,
  `idRodape` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPaginaProcedimento`),
  KEY `fk_proc_men_idx` (`idMenu`),
  KEY `fk_proc_rod_idx` (`idRodape`),
  CONSTRAINT `fk_proc_men` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_proc_rod` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_procedimento_exame`
--

LOCK TABLES `pagina_procedimento_exame` WRITE;
/*!40000 ALTER TABLE `pagina_procedimento_exame` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_procedimento_exame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_sobre`
--

DROP TABLE IF EXISTS `pagina_sobre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_sobre` (
  `idPaginaSobre` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) DEFAULT NULL,
  `fotoSobre` varchar(255) NOT NULL,
  `textoSobre` text NOT NULL,
  `ativo` int(1) DEFAULT NULL,
  `idRodape` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPaginaSobre`),
  KEY `fk_sobre_menu_idx` (`idMenu`),
  KEY `fk_sobre_rodape_idx` (`idRodape`),
  CONSTRAINT `fk_sobre_menu` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_sobre_rodape` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_sobre`
--

LOCK TABLES `pagina_sobre` WRITE;
/*!40000 ALTER TABLE `pagina_sobre` DISABLE KEYS */;
INSERT INTO `pagina_sobre` VALUES (3,NULL,'arquivos/08a98ea2725092ea3754e49597cc8c5b.jpg','LALA',NULL,NULL);
/*!40000 ALTER TABLE `pagina_sobre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina_trabalhe_conosco`
--

DROP TABLE IF EXISTS `pagina_trabalhe_conosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina_trabalhe_conosco` (
  `idPaginaTrabalheConosco` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) NOT NULL,
  `fotoPrincipal` varchar(255) NOT NULL,
  `tituloPagina` varchar(255) NOT NULL,
  `idRodape` int(11) NOT NULL,
  PRIMARY KEY (`idPaginaTrabalheConosco`),
  KEY `fk_trabalhe_men_idx` (`idMenu`),
  KEY `fk_trabalhe_rod_idx` (`idRodape`),
  CONSTRAINT `fk_trabalhe_men` FOREIGN KEY (`idMenu`) REFERENCES `tbl_menu` (`idmenu`),
  CONSTRAINT `fk_trabalhe_rod` FOREIGN KEY (`idRodape`) REFERENCES `tbl_rodape` (`idrodape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina_trabalhe_conosco`
--

LOCK TABLES `pagina_trabalhe_conosco` WRITE;
/*!40000 ALTER TABLE `pagina_trabalhe_conosco` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagina_trabalhe_conosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_agenda_consulta`
--

DROP TABLE IF EXISTS `tbl_agenda_consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_agenda_consulta` (
  `idAgendaConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idPagamento` int(11) NOT NULL,
  PRIMARY KEY (`idAgendaConsulta`),
  KEY `fk_paci_agend_consult_idx` (`idPaciente`),
  KEY `fk_medic_consult_idx` (`idMedico`),
  KEY `fk_form_pag_consult_idx` (`idPagamento`),
  CONSTRAINT `fk_form_pag_consult` FOREIGN KEY (`idPagamento`) REFERENCES `tbl_pagamento` (`idpagamento`),
  CONSTRAINT `fk_medic_consult` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idmedico`),
  CONSTRAINT `fk_paci_agend_consult` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_paciente` (`idpaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_agenda_consulta`
--

LOCK TABLES `tbl_agenda_consulta` WRITE;
/*!40000 ALTER TABLE `tbl_agenda_consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_agenda_consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_agenda_exame`
--

DROP TABLE IF EXISTS `tbl_agenda_exame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_agenda_exame` (
  `idAgendaExame` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idExame` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idPagamento` int(11) NOT NULL,
  PRIMARY KEY (`idAgendaExame`),
  KEY `fk_agend_exam_idx` (`idExame`),
  KEY `fk_paci_agend_exam_idx` (`idPaciente`),
  KEY `fk_form_pag_exam_idx` (`idPagamento`),
  KEY `fk_medic_exam_paci_idx` (`idMedico`),
  CONSTRAINT `fk_agend_exam` FOREIGN KEY (`idExame`) REFERENCES `tbl_exame` (`idexame`),
  CONSTRAINT `fk_form_pag_exam` FOREIGN KEY (`idPagamento`) REFERENCES `tbl_pagamento` (`idpagamento`),
  CONSTRAINT `fk_medic_exam_paci` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idmedico`),
  CONSTRAINT `fk_paci_agend_exam` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_paciente` (`idpaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_agenda_exame`
--

LOCK TABLES `tbl_agenda_exame` WRITE;
/*!40000 ALTER TABLE `tbl_agenda_exame` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_agenda_exame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ambiente_cabecalho`
--

DROP TABLE IF EXISTS `tbl_ambiente_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ambiente_cabecalho` (
  `idAmbienteCabecalho` int(11) NOT NULL AUTO_INCREMENT,
  `foto` text NOT NULL,
  `tituloFoto` varchar(255) NOT NULL,
  `tituloPagina` varchar(255) NOT NULL,
  `ativo` char(1) NOT NULL,
  PRIMARY KEY (`idAmbienteCabecalho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambiente_cabecalho`
--

LOCK TABLES `tbl_ambiente_cabecalho` WRITE;
/*!40000 ALTER TABLE `tbl_ambiente_cabecalho` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ambiente_cabecalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ambulancia`
--

DROP TABLE IF EXISTS `tbl_ambulancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ambulancia` (
  `idAmbulancia` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `ano` year(4) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `idTipoAmbulancia` int(11) NOT NULL,
  `idUnidade` int(11) NOT NULL,
  `idStatusAmbulancia` int(11) NOT NULL,
  PRIMARY KEY (`idAmbulancia`),
  UNIQUE KEY `idAmbulancia_UNIQUE` (`idAmbulancia`),
  KEY `fk_tip_amb_idx` (`idTipoAmbulancia`),
  KEY `fk_amb_unid_idx` (`idUnidade`),
  KEY `fk_stat_amb_idx` (`idStatusAmbulancia`),
  CONSTRAINT `fk_amb_unid` FOREIGN KEY (`idUnidade`) REFERENCES `tbl_unidade_cabecalho` (`idunidade`),
  CONSTRAINT `fk_stat_amb` FOREIGN KEY (`idStatusAmbulancia`) REFERENCES `tbl_status_ambulancia` (`idstatusambulancia`),
  CONSTRAINT `fk_tip_amb` FOREIGN KEY (`idTipoAmbulancia`) REFERENCES `tbl_tipo_ambulancia` (`idtipoambulancia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambulancia`
--

LOCK TABLES `tbl_ambulancia` WRITE;
/*!40000 ALTER TABLE `tbl_ambulancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ambulancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_andar`
--

DROP TABLE IF EXISTS `tbl_andar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_andar` (
  `idAndar` int(11) NOT NULL AUTO_INCREMENT,
  `andar` int(11) NOT NULL,
  PRIMARY KEY (`idAndar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_andar`
--

LOCK TABLES `tbl_andar` WRITE;
/*!40000 ALTER TABLE `tbl_andar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_andar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_atendimento`
--

DROP TABLE IF EXISTS `tbl_atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_atendimento` (
  `idAtendimento` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idSituacao` int(11) NOT NULL,
  `idSetor` int(11) NOT NULL,
  PRIMARY KEY (`idAtendimento`),
  KEY `fk_atend_paci_idx` (`idPaciente`),
  KEY `fk_situa_paci_idx` (`idSituacao`),
  KEY `fk_setor_atend_paci_idx` (`idSetor`),
  CONSTRAINT `fk_atend_paci` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_paciente` (`idpaciente`),
  CONSTRAINT `fk_setor_atend_paci` FOREIGN KEY (`idSetor`) REFERENCES `tbl_setor` (`idsetor`),
  CONSTRAINT `fk_situa_paci` FOREIGN KEY (`idSituacao`) REFERENCES `tbl_situacao_paciente` (`idsituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_atendimento`
--

LOCK TABLES `tbl_atendimento` WRITE;
/*!40000 ALTER TABLE `tbl_atendimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cargo`
--

DROP TABLE IF EXISTS `tbl_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cargo` (
  `idCargo` int(11) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cargo`
--

LOCK TABLES `tbl_cargo` WRITE;
/*!40000 ALTER TABLE `tbl_cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cidade`
--

DROP TABLE IF EXISTS `tbl_cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cidade` (
  `idCidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cidade`
--

LOCK TABLES `tbl_cidade` WRITE;
/*!40000 ALTER TABLE `tbl_cidade` DISABLE KEYS */;
INSERT INTO `tbl_cidade` VALUES (1,'Alta Floresta D\'Oeste'),(2,'Ariquemes'),(3,'Cabixi'),(4,'Cacoal'),(5,'Embaúba'),(6,'Embu das Artes'),(7,'Embu-Guaçu'),(8,'Emilianópolis'),(9,'Engenheiro Coelho'),(10,'Espírito Santo do Pinhal'),(11,'Espírito Santo do Turvo'),(12,'Estrela D\'Oeste'),(13,'Estrela do Norte'),(14,'Euclides da Cunha Paulista');
/*!40000 ALTER TABLE `tbl_cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_consultorio`
--

DROP TABLE IF EXISTS `tbl_consultorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_consultorio` (
  `idConsultorio` int(11) NOT NULL AUTO_INCREMENT,
  `consultorio` varchar(255) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idEspecialidade` int(11) NOT NULL,
  PRIMARY KEY (`idConsultorio`),
  KEY `fk_consultorio_medic_idx` (`idMedico`),
  KEY `fk_consultorio_especi_idx` (`idEspecialidade`),
  CONSTRAINT `fk_consultorio_especi` FOREIGN KEY (`idEspecialidade`) REFERENCES `tbl_especialidade` (`idespecialidade`),
  CONSTRAINT `fk_consultorio_medic` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idmedico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_consultorio`
--

LOCK TABLES `tbl_consultorio` WRITE;
/*!40000 ALTER TABLE `tbl_consultorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_consultorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_conta_pagar`
--

DROP TABLE IF EXISTS `tbl_conta_pagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_conta_pagar` (
  `idConta` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoConta` int(11) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dataVencimento` float NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`idConta`),
  KEY `fk_tip_cont_idx` (`idTipoConta`),
  KEY `fk_fuc_pag_idx` (`idFuncionario`),
  CONSTRAINT `fk_fuc_pag` FOREIGN KEY (`idFuncionario`) REFERENCES `tbl_funcionario` (`idfuncionario`),
  CONSTRAINT `fk_tip_cont` FOREIGN KEY (`idTipoConta`) REFERENCES `tbl_tipo_conta` (`idtipoconta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_conta_pagar`
--

LOCK TABLES `tbl_conta_pagar` WRITE;
/*!40000 ALTER TABLE `tbl_conta_pagar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_conta_pagar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_conteudo_cabecalho`
--

DROP TABLE IF EXISTS `tbl_conteudo_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_conteudo_cabecalho` (
  `idConteudoCabecalho` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) DEFAULT NULL,
  `tituloFoto` varchar(255) DEFAULT NULL,
  `tituloPagina` varchar(100) NOT NULL,
  `ativo` int(1) DEFAULT NULL,
  PRIMARY KEY (`idConteudoCabecalho`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_conteudo_cabecalho`
--

LOCK TABLES `tbl_conteudo_cabecalho` WRITE;
/*!40000 ALTER TABLE `tbl_conteudo_cabecalho` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_conteudo_cabecalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_convenio`
--

DROP TABLE IF EXISTS `tbl_convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_convenio` (
  `idConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`idConvenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_convenio`
--

LOCK TABLES `tbl_convenio` WRITE;
/*!40000 ALTER TABLE `tbl_convenio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dado_contato`
--

DROP TABLE IF EXISTS `tbl_dado_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_dado_contato` (
  `idDadoContato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sugestao_critica` char(1) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`idDadoContato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dado_contato`
--

LOCK TABLES `tbl_dado_contato` WRITE;
/*!40000 ALTER TABLE `tbl_dado_contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dado_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dado_trabalhe_conosco`
--

DROP TABLE IF EXISTS `tbl_dado_trabalhe_conosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_dado_trabalhe_conosco` (
  `idDados` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `curriculo` varchar(255) NOT NULL,
  PRIMARY KEY (`idDados`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dado_trabalhe_conosco`
--

LOCK TABLES `tbl_dado_trabalhe_conosco` WRITE;
/*!40000 ALTER TABLE `tbl_dado_trabalhe_conosco` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dado_trabalhe_conosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_endereco`
--

DROP TABLE IF EXISTS `tbl_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` int(11) NOT NULL,
  `idCidade` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idEndereco`),
  KEY `fk_end_city_idx` (`idCidade`),
  KEY `fk_end_estad_idx` (`idEstado`),
  CONSTRAINT `fk_end_city` FOREIGN KEY (`idCidade`) REFERENCES `tbl_cidade` (`idCidade`),
  CONSTRAINT `fk_end_estad` FOREIGN KEY (`idEstado`) REFERENCES `tbl_estado` (`idestado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_endereco`
--

LOCK TABLES `tbl_endereco` WRITE;
/*!40000 ALTER TABLE `tbl_endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_especialidade`
--

DROP TABLE IF EXISTS `tbl_especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_especialidade` (
  `idEspecialidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`idEspecialidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_especialidade`
--

LOCK TABLES `tbl_especialidade` WRITE;
/*!40000 ALTER TABLE `tbl_especialidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estado`
--

DROP TABLE IF EXISTS `tbl_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sigla` char(2) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado`
--

LOCK TABLES `tbl_estado` WRITE;
/*!40000 ALTER TABLE `tbl_estado` DISABLE KEYS */;
INSERT INTO `tbl_estado` VALUES (1,'Alagoas','AL'),(2,'Amapá','AP'),(3,'Amazonas','AM'),(4,'Bahia','BA'),(5,'Ceará','CE'),(6,'Distrito Federal','DF'),(7,'Espírito Santo','ES'),(8,'Goiás','GO'),(9,'Maranhão','MA'),(10,'Mato Grosso','MT'),(11,'Mato Grosso do Sul','MS'),(12,'Minas Gerais','MG'),(13,'Pará','PA'),(14,'Paraíba','PB'),(15,'Paraná','PR'),(16,'Pernambuco','PE'),(17,'Piauí','PI'),(18,'Rio de Janeiro','RJ'),(19,'Rio Grande do Norte','RN'),(20,'Rio Grande do Sul','RS'),(21,'Rondônia','RO'),(22,'Roraima','RR'),(23,'Santa Catarina','SC'),(24,'São Paulo','SP'),(25,'Sergipe','SE'),(26,'Tocantins','TO');
/*!40000 ALTER TABLE `tbl_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estado_civil`
--

DROP TABLE IF EXISTS `tbl_estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estado_civil` (
  `idEstadoCivil` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`idEstadoCivil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado_civil`
--

LOCK TABLES `tbl_estado_civil` WRITE;
/*!40000 ALTER TABLE `tbl_estado_civil` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_exame`
--

DROP TABLE IF EXISTS `tbl_exame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_exame` (
  `idExame` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `idTipoExame` int(11) NOT NULL,
  PRIMARY KEY (`idExame`),
  KEY `fk_exa_tipo_idx` (`idTipoExame`),
  CONSTRAINT `fk_exa_tipo` FOREIGN KEY (`idTipoExame`) REFERENCES `tbl_tipo_exame` (`idtipoexame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exame`
--

LOCK TABLES `tbl_exame` WRITE;
/*!40000 ALTER TABLE `tbl_exame` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_exame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_funcionario`
--

DROP TABLE IF EXISTS `tbl_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `idCargo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `dtNasc` date NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `dtAdmissao` date NOT NULL,
  `cnh` varchar(255) NOT NULL,
  `idEndereco` int(11) NOT NULL,
  `idEstadoCivil` int(11) NOT NULL,
  `idNivelPortal` int(11) NOT NULL,
  `idSetor` int(11) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  KEY `fk_carg_func_idx` (`idCargo`),
  KEY `fk_end_func_idx` (`idEndereco`),
  KEY `fk_estad_func_idx` (`idEstadoCivil`),
  KEY `fk_niv_port_idx` (`idNivelPortal`),
  KEY `fk_func_setor_idx` (`idSetor`),
  CONSTRAINT `fk_carg_func` FOREIGN KEY (`idCargo`) REFERENCES `tbl_cargo` (`idCargo`),
  CONSTRAINT `fk_end_func` FOREIGN KEY (`idEndereco`) REFERENCES `tbl_endereco` (`idEndereco`),
  CONSTRAINT `fk_estad_func` FOREIGN KEY (`idEstadoCivil`) REFERENCES `tbl_estado_civil` (`idEstadoCivil`),
  CONSTRAINT `fk_func_setor` FOREIGN KEY (`idSetor`) REFERENCES `tbl_setor` (`idsetor`),
  CONSTRAINT `fk_niv_port` FOREIGN KEY (`idNivelPortal`) REFERENCES `tbl_nivel_portal` (`idnivelportal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_funcionario`
--

LOCK TABLES `tbl_funcionario` WRITE;
/*!40000 ALTER TABLE `tbl_funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_historico_paciente`
--

DROP TABLE IF EXISTS `tbl_historico_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_historico_paciente` (
  `idHistorico` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idAgendaConsulta` int(11) DEFAULT NULL,
  `idAgendaExame` int(11) DEFAULT NULL,
  `idResultadoExame` int(11) DEFAULT NULL,
  `idMedicamento` int(11) DEFAULT NULL,
  `dosagem` varchar(100) DEFAULT NULL,
  `idReceita` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `fk_hist_paci_consult_idx` (`idAgendaConsulta`),
  KEY `fk_hist_paci_exam_idx` (`idAgendaExame`),
  KEY `fk_hist_paci_result_exam_idx` (`idResultadoExame`),
  KEY `fk_hist_receita_idx` (`idReceita`),
  KEY `fk_hist_paci_idx` (`idPaciente`),
  KEY `fk_hist_medic_idx` (`idMedico`),
  KEY `fk_hist_medicamento_idx` (`idMedicamento`),
  CONSTRAINT `fk_hist_medic` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idmedico`),
  CONSTRAINT `fk_hist_medicamento` FOREIGN KEY (`idMedicamento`) REFERENCES `tbl_medicamento` (`idmedicamento`),
  CONSTRAINT `fk_hist_paci` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_paciente` (`idpaciente`),
  CONSTRAINT `fk_hist_paci_consult` FOREIGN KEY (`idAgendaConsulta`) REFERENCES `tbl_agenda_consulta` (`idAgendaConsulta`),
  CONSTRAINT `fk_hist_paci_exam` FOREIGN KEY (`idAgendaExame`) REFERENCES `tbl_agenda_exame` (`idAgendaExame`),
  CONSTRAINT `fk_hist_paci_result_exam` FOREIGN KEY (`idResultadoExame`) REFERENCES `tbl_resultado_exame` (`idresultadoexame`),
  CONSTRAINT `fk_hist_receita` FOREIGN KEY (`idReceita`) REFERENCES `tbl_receita` (`idreceita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_historico_paciente`
--

LOCK TABLES `tbl_historico_paciente` WRITE;
/*!40000 ALTER TABLE `tbl_historico_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_historico_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_localiza_ambulancia`
--

DROP TABLE IF EXISTS `tbl_localiza_ambulancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_localiza_ambulancia` (
  `idLocalizaAmbulancia` int(11) NOT NULL AUTO_INCREMENT,
  `longitude` varchar(255) NOT NULL,
  `lalitude` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idLocalizaAmbulancia`),
  KEY `fk_func_motorist_idx` (`idFuncionario`),
  CONSTRAINT `fk_func_motorist` FOREIGN KEY (`idFuncionario`) REFERENCES `tbl_funcionario` (`idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_localiza_ambulancia`
--

LOCK TABLES `tbl_localiza_ambulancia` WRITE;
/*!40000 ALTER TABLE `tbl_localiza_ambulancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_localiza_ambulancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_login` (
  `idLogin` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`idLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_login`
--

LOCK TABLES `tbl_login` WRITE;
/*!40000 ALTER TABLE `tbl_login` DISABLE KEYS */;
INSERT INTO `tbl_login` VALUES (1,'123','123');
/*!40000 ALTER TABLE `tbl_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_manutencao_ambulancia`
--

DROP TABLE IF EXISTS `tbl_manutencao_ambulancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_manutencao_ambulancia` (
  `idInformacao` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idAmbulancia` int(11) NOT NULL,
  `idTipoManutencao` int(11) NOT NULL,
  PRIMARY KEY (`idInformacao`),
  KEY `fk_man_amb_idx` (`idAmbulancia`),
  KEY `fk_tip_man_amb_idx` (`idTipoManutencao`),
  CONSTRAINT `fk_man_amb` FOREIGN KEY (`idAmbulancia`) REFERENCES `tbl_ambulancia` (`idAmbulancia`),
  CONSTRAINT `fk_tip_man_amb` FOREIGN KEY (`idTipoManutencao`) REFERENCES `tbl_tipo_manutencao` (`idtipomanutencao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_manutencao_ambulancia`
--

LOCK TABLES `tbl_manutencao_ambulancia` WRITE;
/*!40000 ALTER TABLE `tbl_manutencao_ambulancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_manutencao_ambulancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_medicamento`
--

DROP TABLE IF EXISTS `tbl_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_medicamento` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_medicamento`
--

LOCK TABLES `tbl_medicamento` WRITE;
/*!40000 ALTER TABLE `tbl_medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_medico`
--

DROP TABLE IF EXISTS `tbl_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_medico` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `idCargo` int(11) NOT NULL,
  `dtAdmissao` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `crm` varchar(255) NOT NULL,
  `dtNasc` date NOT NULL,
  `idEndereco` int(11) NOT NULL,
  `idEspecialidade` int(11) NOT NULL,
  `idNivelPortal` int(11) NOT NULL,
  `idEstadoCivil` int(11) NOT NULL,
  PRIMARY KEY (`idMedico`),
  KEY `fk_carg_medico_idx` (`idCargo`),
  KEY `fk_end_medico_idx` (`idEndereco`),
  KEY `fk_esp_medico_idx` (`idEspecialidade`),
  KEY `fk_niv_medico_idx` (`idNivelPortal`),
  KEY `fk_estad_civ_medico_idx` (`idEstadoCivil`),
  CONSTRAINT `fk_carg_medico` FOREIGN KEY (`idCargo`) REFERENCES `tbl_cargo` (`idCargo`),
  CONSTRAINT `fk_end_medico` FOREIGN KEY (`idEndereco`) REFERENCES `tbl_endereco` (`idEndereco`),
  CONSTRAINT `fk_esp_medico` FOREIGN KEY (`idEspecialidade`) REFERENCES `tbl_especialidade` (`idEspecialidade`),
  CONSTRAINT `fk_estad_civ_medico` FOREIGN KEY (`idEstadoCivil`) REFERENCES `tbl_estado_civil` (`idEstadoCivil`),
  CONSTRAINT `fk_niv_medico` FOREIGN KEY (`idNivelPortal`) REFERENCES `tbl_nivel_portal` (`idnivelportal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_medico`
--

LOCK TABLES `tbl_medico` WRITE;
/*!40000 ALTER TABLE `tbl_medico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu` (
  `idMenu` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `fotoCadastro` varchar(255) NOT NULL,
  `fotoLogin` varchar(45) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu`
--

LOCK TABLES `tbl_menu` WRITE;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel_portal`
--

DROP TABLE IF EXISTS `tbl_nivel_portal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel_portal` (
  `idNivelPortal` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(255) NOT NULL,
  PRIMARY KEY (`idNivelPortal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel_portal`
--

LOCK TABLES `tbl_nivel_portal` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_portal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nivel_portal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_paciente`
--

DROP TABLE IF EXISTS `tbl_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_paciente` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `dtNasc` date NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telResidencial` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `idEndereco` int(11) NOT NULL,
  `idEstadoCivil` int(11) NOT NULL,
  `idTipoSanguineo` int(11) NOT NULL,
  `idConvenio` int(11) NOT NULL,
  `idPlano` int(11) NOT NULL,
  `fotoConvenio` text NOT NULL,
  `fotoPaciente` text NOT NULL,
  PRIMARY KEY (`idPaciente`),
  KEY `fk_tipo_sangue_idx` (`idTipoSanguineo`),
  KEY `fk_estad_civ_idx` (`idEstadoCivil`),
  KEY `fk_paci_conv_idx` (`idPlano`),
  KEY `fk_paci_conv_idx1` (`idConvenio`),
  KEY `fk_end_paci_idx` (`idEndereco`),
  CONSTRAINT `fk_end_paci` FOREIGN KEY (`idEndereco`) REFERENCES `tbl_endereco` (`idEndereco`),
  CONSTRAINT `fk_estad_civ` FOREIGN KEY (`idEstadoCivil`) REFERENCES `tbl_estado_civil` (`idEstadoCivil`),
  CONSTRAINT `fk_paci_conv` FOREIGN KEY (`idConvenio`) REFERENCES `tbl_convenio` (`idConvenio`),
  CONSTRAINT `fk_paci_plan_comv` FOREIGN KEY (`idPlano`) REFERENCES `tbl_plano_convenio` (`idplano`),
  CONSTRAINT `fk_tipo_sangue` FOREIGN KEY (`idTipoSanguineo`) REFERENCES `tbl_tipo_sanguineo` (`idtiposanguineo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paciente`
--

LOCK TABLES `tbl_paciente` WRITE;
/*!40000 ALTER TABLE `tbl_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pagamento`
--

DROP TABLE IF EXISTS `tbl_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pagamento` (
  `idPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `formaPagamentp` varchar(255) NOT NULL,
  PRIMARY KEY (`idPagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pagamento`
--

LOCK TABLES `tbl_pagamento` WRITE;
/*!40000 ALTER TABLE `tbl_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pergunta_chatbot`
--

DROP TABLE IF EXISTS `tbl_pergunta_chatbot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pergunta_chatbot` (
  `idPergunta` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text NOT NULL,
  PRIMARY KEY (`idPergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pergunta_chatbot`
--

LOCK TABLES `tbl_pergunta_chatbot` WRITE;
/*!40000 ALTER TABLE `tbl_pergunta_chatbot` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pergunta_chatbot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_plano_convenio`
--

DROP TABLE IF EXISTS `tbl_plano_convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_plano_convenio` (
  `idPlano` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `idConvenio` int(11) NOT NULL,
  PRIMARY KEY (`idPlano`),
  KEY `fk_plan_conv_idx` (`idConvenio`),
  CONSTRAINT `fk_plan_conv` FOREIGN KEY (`idConvenio`) REFERENCES `tbl_convenio` (`idConvenio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_plano_convenio`
--

LOCK TABLES `tbl_plano_convenio` WRITE;
/*!40000 ALTER TABLE `tbl_plano_convenio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_plano_convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_preco_consulta`
--

DROP TABLE IF EXISTS `tbl_preco_consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_preco_consulta` (
  `idPrecoConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `preco` float NOT NULL,
  `idAgendaConsulta` int(11) NOT NULL,
  PRIMARY KEY (`idPrecoConsulta`),
  KEY `fk_agend_prec_consult_idx` (`idAgendaConsulta`),
  CONSTRAINT `fk_agend_prec_consult` FOREIGN KEY (`idAgendaConsulta`) REFERENCES `tbl_agenda_consulta` (`idAgendaConsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_preco_consulta`
--

LOCK TABLES `tbl_preco_consulta` WRITE;
/*!40000 ALTER TABLE `tbl_preco_consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_preco_consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_preco_exame`
--

DROP TABLE IF EXISTS `tbl_preco_exame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_preco_exame` (
  `idPrecoExame` int(11) NOT NULL AUTO_INCREMENT,
  `preco` float NOT NULL,
  `idExame` int(11) NOT NULL,
  PRIMARY KEY (`idPrecoExame`),
  KEY `fk_tip_exam_prec_idx` (`idExame`),
  CONSTRAINT `fk_tip_exam_prec` FOREIGN KEY (`idExame`) REFERENCES `tbl_exame` (`idExame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_preco_exame`
--

LOCK TABLES `tbl_preco_exame` WRITE;
/*!40000 ALTER TABLE `tbl_preco_exame` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_preco_exame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_procedimento_cabecalho`
--

DROP TABLE IF EXISTS `tbl_procedimento_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_procedimento_cabecalho` (
  `idProcedimentoCabecalho` int(11) NOT NULL AUTO_INCREMENT,
  `fotoCabecalho` varchar(255) DEFAULT NULL,
  `tituloFoto` varchar(255) DEFAULT NULL,
  `tituloCabecalho` varchar(255) DEFAULT NULL,
  `ativo` int(1) DEFAULT NULL,
  PRIMARY KEY (`idProcedimentoCabecalho`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_procedimento_cabecalho`
--

LOCK TABLES `tbl_procedimento_cabecalho` WRITE;
/*!40000 ALTER TABLE `tbl_procedimento_cabecalho` DISABLE KEYS */;
INSERT INTO `tbl_procedimento_cabecalho` VALUES (5,'','','',NULL),(6,'','','',NULL),(7,'','','',NULL),(8,'','','',NULL),(9,'','','',NULL);
/*!40000 ALTER TABLE `tbl_procedimento_cabecalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_prontuario`
--

DROP TABLE IF EXISTS `tbl_prontuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_prontuario` (
  `idProntuario` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`idProntuario`),
  KEY `fk_pront_paci_idx` (`idPaciente`),
  KEY `fk_pront_medic_idx` (`idMedico`),
  CONSTRAINT `fk_pront_medic` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idMedico`),
  CONSTRAINT `fk_pront_paci` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_paciente` (`idPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prontuario`
--

LOCK TABLES `tbl_prontuario` WRITE;
/*!40000 ALTER TABLE `tbl_prontuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_prontuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_quarto`
--

DROP TABLE IF EXISTS `tbl_quarto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_quarto` (
  `idQuarto` int(11) NOT NULL AUTO_INCREMENT,
  `numeroQuarto` varchar(255) NOT NULL,
  `numeroLeito` varchar(255) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idAndar` int(11) NOT NULL,
  PRIMARY KEY (`idQuarto`),
  KEY `fk_status_quarto_idx` (`idStatus`),
  KEY `fk_andar_quarto_idx` (`idAndar`),
  CONSTRAINT `fk_andar_quarto` FOREIGN KEY (`idAndar`) REFERENCES `tbl_andar` (`idAndar`),
  CONSTRAINT `fk_status_quarto` FOREIGN KEY (`idStatus`) REFERENCES `tbl_status_quarto` (`idstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_quarto`
--

LOCK TABLES `tbl_quarto` WRITE;
/*!40000 ALTER TABLE `tbl_quarto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_quarto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_receita`
--

DROP TABLE IF EXISTS `tbl_receita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_receita` (
  `idReceita` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idMedicamento` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `idMedico` int(11) NOT NULL,
  PRIMARY KEY (`idReceita`),
  KEY `fk_receit_medic_idx` (`idMedico`),
  CONSTRAINT `fk_receit_medic` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idMedico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_receita`
--

LOCK TABLES `tbl_receita` WRITE;
/*!40000 ALTER TABLE `tbl_receita` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_receita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resposta_chatbot`
--

DROP TABLE IF EXISTS `tbl_resposta_chatbot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_resposta_chatbot` (
  `idResposta` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` text NOT NULL,
  `idPergunta` int(11) NOT NULL,
  PRIMARY KEY (`idResposta`),
  KEY `fk_per_respos_idx` (`idPergunta`),
  CONSTRAINT `fk_per_respos` FOREIGN KEY (`idPergunta`) REFERENCES `tbl_pergunta_chatbot` (`idPergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resposta_chatbot`
--

LOCK TABLES `tbl_resposta_chatbot` WRITE;
/*!40000 ALTER TABLE `tbl_resposta_chatbot` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_resposta_chatbot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_resultado_exame`
--

DROP TABLE IF EXISTS `tbl_resultado_exame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_resultado_exame` (
  `idResultadoExame` int(11) NOT NULL AUTO_INCREMENT,
  `idPaciente` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idExame` int(11) NOT NULL,
  `resultado` varchar(255) NOT NULL,
  PRIMARY KEY (`idResultadoExame`),
  KEY `fk_res_paci_idx` (`idPaciente`),
  KEY `fk_tip_exame_idx` (`idExame`),
  KEY `fk_res_medic_idx` (`idMedico`),
  CONSTRAINT `fk_res_medic` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idMedico`),
  CONSTRAINT `fk_res_paci` FOREIGN KEY (`idPaciente`) REFERENCES `tbl_paciente` (`idPaciente`),
  CONSTRAINT `fk_tip_exame` FOREIGN KEY (`idExame`) REFERENCES `tbl_exame` (`idExame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_resultado_exame`
--

LOCK TABLES `tbl_resultado_exame` WRITE;
/*!40000 ALTER TABLE `tbl_resultado_exame` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_resultado_exame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_rodape`
--

DROP TABLE IF EXISTS `tbl_rodape`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_rodape` (
  `idRodape` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL,
  PRIMARY KEY (`idRodape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rodape`
--

LOCK TABLES `tbl_rodape` WRITE;
/*!40000 ALTER TABLE `tbl_rodape` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_rodape` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_servico`
--

DROP TABLE IF EXISTS `tbl_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_servico` (
  `idServico` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`idServico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_servico`
--

LOCK TABLES `tbl_servico` WRITE;
/*!40000 ALTER TABLE `tbl_servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_setor`
--

DROP TABLE IF EXISTS `tbl_setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_setor` (
  `idSetor` int(11) NOT NULL AUTO_INCREMENT,
  `setor` varchar(45) NOT NULL,
  PRIMARY KEY (`idSetor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_setor`
--

LOCK TABLES `tbl_setor` WRITE;
/*!40000 ALTER TABLE `tbl_setor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_situacao_paciente`
--

DROP TABLE IF EXISTS `tbl_situacao_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_situacao_paciente` (
  `idSituacao` int(11) NOT NULL AUTO_INCREMENT,
  `situacao` varchar(100) NOT NULL,
  PRIMARY KEY (`idSituacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_situacao_paciente`
--

LOCK TABLES `tbl_situacao_paciente` WRITE;
/*!40000 ALTER TABLE `tbl_situacao_paciente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_situacao_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_slider` (
  `idSlider` int(11) NOT NULL AUTO_INCREMENT,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`idSlider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_slider`
--

LOCK TABLES `tbl_slider` WRITE;
/*!40000 ALTER TABLE `tbl_slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobre_cabecalho`
--

DROP TABLE IF EXISTS `tbl_sobre_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sobre_cabecalho` (
  `idSobreCabecalho` int(11) NOT NULL AUTO_INCREMENT,
  `fotoCabecalho` varchar(255) NOT NULL,
  `tituloFoto` varchar(100) NOT NULL,
  `tituloPagina` varchar(100) NOT NULL,
  `ativo` int(1) DEFAULT NULL,
  PRIMARY KEY (`idSobreCabecalho`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobre_cabecalho`
--

LOCK TABLES `tbl_sobre_cabecalho` WRITE;
/*!40000 ALTER TABLE `tbl_sobre_cabecalho` DISABLE KEYS */;
INSERT INTO `tbl_sobre_cabecalho` VALUES (2,'arquivos/0195a01fdd88db3ecf6513b95b0b6d15.jpg','UPDATE Sobre','UPDATE',0);
/*!40000 ALTER TABLE `tbl_sobre_cabecalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status_ambulancia`
--

DROP TABLE IF EXISTS `tbl_status_ambulancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status_ambulancia` (
  `idStatusAmbulancia` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`idStatusAmbulancia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status_ambulancia`
--

LOCK TABLES `tbl_status_ambulancia` WRITE;
/*!40000 ALTER TABLE `tbl_status_ambulancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_status_ambulancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status_quarto`
--

DROP TABLE IF EXISTS `tbl_status_quarto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status_quarto` (
  `idStatus` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status_quarto`
--

LOCK TABLES `tbl_status_quarto` WRITE;
/*!40000 ALTER TABLE `tbl_status_quarto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_status_quarto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_telefone_medico`
--

DROP TABLE IF EXISTS `tbl_telefone_medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_telefone_medico` (
  `idTelefone` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(50) NOT NULL,
  `idMedico` int(11) NOT NULL,
  `idTipoTelefone` int(11) NOT NULL,
  PRIMARY KEY (`idTelefone`),
  KEY `fk_tel_medic_idx` (`idMedico`),
  KEY `fk_tip_tel_medic_idx` (`idTipoTelefone`),
  CONSTRAINT `fk_tel_medic` FOREIGN KEY (`idMedico`) REFERENCES `tbl_medico` (`idMedico`),
  CONSTRAINT `fk_tip_tel_medic` FOREIGN KEY (`idTipoTelefone`) REFERENCES `tbl_tipo_telefone` (`idtipotelefone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_telefone_medico`
--

LOCK TABLES `tbl_telefone_medico` WRITE;
/*!40000 ALTER TABLE `tbl_telefone_medico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_telefone_medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_ambulancia`
--

DROP TABLE IF EXISTS `tbl_tipo_ambulancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_ambulancia` (
  `idTipoAmbulancia` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoAmbulancia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_ambulancia`
--

LOCK TABLES `tbl_tipo_ambulancia` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_ambulancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_ambulancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_conta`
--

DROP TABLE IF EXISTS `tbl_tipo_conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_conta` (
  `idTipoConta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoConta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_conta`
--

LOCK TABLES `tbl_tipo_conta` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_conta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_exame`
--

DROP TABLE IF EXISTS `tbl_tipo_exame`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_exame` (
  `idTipoExame` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoExame`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_exame`
--

LOCK TABLES `tbl_tipo_exame` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_exame` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_exame` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_manutencao`
--

DROP TABLE IF EXISTS `tbl_tipo_manutencao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_manutencao` (
  `idTipoManutencao` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoManutencao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_manutencao`
--

LOCK TABLES `tbl_tipo_manutencao` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_manutencao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_manutencao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_sanguineo`
--

DROP TABLE IF EXISTS `tbl_tipo_sanguineo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_sanguineo` (
  `idTipoSanguineo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoSanguineo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_sanguineo`
--

LOCK TABLES `tbl_tipo_sanguineo` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_sanguineo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_sanguineo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_telefone`
--

DROP TABLE IF EXISTS `tbl_tipo_telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_telefone` (
  `idTipoTelefone` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoTelefone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_telefone`
--

LOCK TABLES `tbl_tipo_telefone` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_telefone` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_unid_cabecalho`
--

DROP TABLE IF EXISTS `tbl_unid_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_unid_cabecalho` (
  `idUnidadeCabecalho` int(11) NOT NULL AUTO_INCREMENT,
  `fotoCabecalho` varchar(255) NOT NULL,
  `tituloFoto` varchar(255) NOT NULL,
  `ativo` char(1) DEFAULT NULL,
  PRIMARY KEY (`idUnidadeCabecalho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_unid_cabecalho`
--

LOCK TABLES `tbl_unid_cabecalho` WRITE;
/*!40000 ALTER TABLE `tbl_unid_cabecalho` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_unid_cabecalho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_unidade`
--

DROP TABLE IF EXISTS `tbl_unidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_unidade` (
  `idUnidade` int(11) NOT NULL AUTO_INCREMENT,
  `idMenu` int(11) DEFAULT NULL,
  `fotoUnidade` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `ativo` int(1) DEFAULT NULL,
  `idEndereco` int(11) NOT NULL,
  `idRodape` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUnidade`),
  KEY `fk_unid_menu_idx` (`idMenu`),
  KEY `fk_unid_rodape_idx` (`idRodape`),
  KEY `fk_unidade_ender_idx` (`idEndereco`),
  CONSTRAINT `fk_ender` FOREIGN KEY (`idEndereco`) REFERENCES `tbl_endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_unidade`
--

LOCK TABLES `tbl_unidade` WRITE;
/*!40000 ALTER TABLE `tbl_unidade` DISABLE KEYS */;
INSERT INTO `tbl_unidade` VALUES (2,NULL,'arquivos/c4ca4238a0b923820dcc509a6f75849b.jpg','','','teste','455',NULL,0,NULL);
/*!40000 ALTER TABLE `tbl_unidade` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-09 11:23:09
