-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/12/2018 às 02:30
-- Versão do servidor: 10.1.36-MariaDB
-- Versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_desejos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_produto` int(11) NOT NULL,
  `produto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `preco` float NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `produto`, `preco`, `link`, `id_usuario`) VALUES
(12, 'Microfone Sem Fio Preto Profissional De Alta Qualidade Knup', 33, 'https://produto.mercadolivre.com.br/MLB-898301085-microfone-sem-fio-preto-profissional-de-alta-qualidade-knup-_JM?quantity=1', 11),
(13, 'Chinelo Masculino Havaianas Power', 64, 'https://www.passarela.com.br/produto/chinelo-masculino-havaianas-power/70800857?gclid=Cj0KCQiArqPgBRCRARIsAPwlHoXxyzrEJJrJTl4frQcWvvA5Y2J9CzzUUL1bS8aJrIl7CZ2NTtaIvXIaAr7IEALw_wcB', 11),
(14, 'Ã”nibus de Turismo Com Luz Som FricÃ§Ã£o 1/32 CalifÃ³rnia Action', 114, 'https://www.extra.com.br/brinquedos/CarrinhosVeiculosBrinquedos/caminhoesonibusdebrinquedo/onibus-de-turismo-com-luz-som-friccao-1-32-california-action-11813368.html?gclid=Cj0KCQiArqPgBRCRARIsAPwlHoXn', 11),
(15, 'PÃ©rola negra Piratas do Navio de NavigaÃ§Ã£o de madeira', 126, 'https://pt.aliexpress.com/item/Wood-black-pearl-Pirates-Sailing-Ship-Model-Handmade-decoration-furnishing-articles-Crafts-Gift/32809410961.html?src=google&albslr=225305893&src=google&albch=shopping&ac', 12),
(16, 'Mesa de Sinuca 3,10 X 1,60m Preto 6 PÃ©s Laqueada Preta JequitibÃ¡ Michigan Bilhar', 11.937, 'https://www.google.com.br/shopping/product/18017384377418812948?q=mesa+de+sinuca&client=opera&hs=pSS&biw=1320&bih=696&prds=paur:ClkAsKraXzs4byJXPFJng9IUwMphb1N3y1SKW90_gOVbPd-GAZnZP0B-Yvu7rlfjuv-soBAn', 12),
(17, 'CAMISA NIKE BARCELONA I 2018/2019 TORCEDOR MASCULINA', 249, 'https://www.nike.com.br/CAMISA-MANGA-CURTA-FCB-M-NK-BRT-STAD-JSY-598136.html?utm_source=googleshop&utm_medium=comparadorpreco&utm_campaign=Roupas&utm_content=598136&gclid=Cj0KCQiArqPgBRCRARIsAPwlHoX91', 12),
(18, 'iPhone 8 64GB Cinza Espacial Tela 4.7\" IOS 4G CÃ¢mera 12MP - Apple', 2.999, 'https://www.americanas.com.br/produto/133776099/iphone-8-64gb-cinza-espacial-tela-4-7-ios-4g-camera-12mp-apple?WT.srch=1&epar=bp_pl_00_go_tel_geral_1p&gclid=Cj0KCQiArqPgBRCRARIsAPwlHoXTQvsRLgpuM4IU2VX', 12),
(19, 'Teclado Gamer HyperX Mars RGB MecÃ¢nico US', 319, 'https://www.kabum.com.br/cgi-local/site/produtos/descricao_ofertas.cgi?codigo=92590', 9),
(20, 'Kaspersky AntivÃ­rus 2018 1 PC', 24, 'https://www.kabum.com.br/cgi-local/site/produtos/descricao_ofertas.cgi?codigo=80722', 9),
(21, 'Mouse Gamer Razer Deathadder Elite Chroma MecÃ¢nico 16.000 DPI', 329, 'https://www.kabum.com.br/cgi-local/site/produtos/descricao_ofertas.cgi?codigo=84441', 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `usuario`, `email`, `senha`) VALUES
(9, 'admin', 'admin@admin', '$2y$10$ZarzEmHB7/oQXf63eJN.XuKP8qom1FCZzN7EhYNEjIRAAoLtJxcZu'),
(11, 'Jasson Goulart', 'papodebusao@globo.com', '$2y$10$cDRZcrQrkSEo/Opg.uPXxe4MfFcnLCRe0F4DhlyjTmF89bUMkawsa'),
(12, 'Davy Jones', 'gameplayrj@rj.com', '$2y$10$UpbBPatU6MgJrt6cPHMMauxEHSUJRGYvUgNYy2C5D/Y6nBVtB0MEK');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
