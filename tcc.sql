-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2023 às 14:42
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(79, 3, 'COMPUTADOR GAMER, AMD RYZEN 5 5500, GEFORCE RTX 2060 SUPER 8GB, 16GB DDR4, SSD 240GB', '3999.98', '../images/1.png', 1),
(80, 3, 'COMPUTADOR GAMER BELETH III, INTEL I5-8500, GEFORCE RTX 2060 SUPER 8GB, 8GB DDR4, SSD 240GB', '3293.88', '../images/2.png', 1),
(81, 14, 'MOUSE GAMER REDRAGON PEGASUS RGB 7200DPI, M705', '100.00', '../images/8.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `order`
--

CREATE TABLE `order` (
  `id` int(99) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(99) NOT NULL,
  `number` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `method` varchar(99) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(99) NOT NULL,
  `country` varchar(99) NOT NULL,
  `state` varchar(99) NOT NULL,
  `total_products` varchar(999) NOT NULL,
  `total_price` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `city`, `country`, `state`, `total_products`, `total_price`) VALUES
(16, 3, 'Pedro Augusto Moreira de Oliveira', '19999999999', 'pedropedoro1@hotmail.com', 'pagar na entrega', 'Rua Hipotética, 255', 'Campinas', 'Brasil', 'São Paulo', 'COMPUTADOR GAMER BELETH III, INTEL I5-8500, GEFORCE RTX 2060 SUPER 8GB, 8GB DDR4, SSD 240GB (1) ', '3293.88'),
(17, 14, 'Pedro Clovis', '456546546', 'pedropedoro1@hotmail.com', 'pagar na entrega', 'Aqui oh', 'Campinas', 'Brasil', 'São Paulo', 'AMD Ryzen 5 5600G, 3.9GHz (4.4GHz Max Turbo), AM4, Vídeo Integrado, 6 Núcleos (1) ', '824.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(360) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `like` int(100) NOT NULL,
  `deslike` int(100) NOT NULL,
  `category` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image`, `like`, `deslike`, `category`) VALUES
(1, 'COMPUTADOR GAMER, AMD RYZEN 5 5500, GEFORCE RTX 2060 SUPER 8GB, 16GB DDR4, SSD 240GB', 'Este PC possui capacidade suficiente para rodar a maioria dos jogos da atualidade. Com o processador I5-4000, e a GTX 1050 4 GB, os jogos como GTA V, Fortnite, League of Legends, Rocket League, terão a grande performance de 60 FPS constante.', '3999.98', '../images/1.png', 1, 0, 'pc'),
(2, 'COMPUTADOR GAMER BELETH III, INTEL I5-8500, GEFORCE RTX 2060 SUPER 8GB, 8GB DDR4, SSD 240GB', 'Este PC possui capacidade suficiente para rodar a maioria dos jogos da atualidade. Com o processador I5-8500, e a GEFORCE RTX 2060 SUPER 8GB, os jogos como GTA V, Fortnite, League of Legends, Rocket League, terão a grande performance de 60 FPS constante.', '3293.88', '../images/2.png', 0, 1, 'pc'),
(3, 'COMPUTADOR GAMER SESHAT III, INTEL I5-10400F, RADEON RX 6650 XT 8GB, 16GB DDR4, SSD M.2 480GB', 'Este PC possui capacidade suficiente para rodar a maioria dos jogos da atualidade. Com o processador I5-10400F, e a RADEON RX 6650 XT 8GB, os jogos como GTA V, Fortnite, League of Legends, Rocket League, terão a grande performance de 200 FPS constante.', '4250.57', '../images/3.png', 1, 0, 'pc'),
(4, 'COMPUTADOR GAMER, INTEL I5-11400, GEFORCE RTX 3060 8GB, 16GB DDR4, SSD 480GB', 'Este PC possui capacidade suficiente para rodar a maioria dos jogos da atualidade. Com o processador I5-4000, e a GTX 1050 4 GB, os jogos como GTA V, Fortnite, League of Legends, Rocket League, terão a grande performance de 60 FPS constante.', '4470.54', '../images/4.png', 0, 0, 'pc'),
(5, 'CAIXA DE SOM CREATIVE MUVO PLAY, 2X5W RMS, BLUETOOTH, PRETO, 06MF386500001', 'A caixa de som oferece um som de alta qualidade e é perfeita para amplificar sua experiência musical. Com design moderno e compacto, ela pode ser facilmente transportada para qualquer lugar. Com potência e clareza sonora, você desfrutará de graves profundos e agudos nítidos. A caixa de som é compatível com dispositivos Bluetooth, permitindo que você reproduz', '359.50', '../images/5.png', 1, 0, 'sound box'),
(6, 'CAIXA DE SOM MAGNAVOX R19BT, 4W RMS 2X2W, BLUETOOTH, USB, AUX, PRETO, R19BT-BK', 'A caixa de som oferece um som de alta qualidade e é perfeita para amplificar sua experiência musical. Com design moderno e compacto, ela pode ser facilmente transportada para qualquer lugar. Com potência e clareza sonora, você desfrutará de graves profundos e agudos nítidos. A caixa de som é compatível com dispositivos Bluetooth, permitindo que você reproduz', '300.00', '../images/6.png', 0, 0, 'sound box'),
(7, 'CAIXA DE SOM JBL R19BT, 4W RMS 2X2W, BLUETOOTH, USB, AUX, PRETO, R19BT-BK', 'A caixa de som oferece um som de alta qualidade e é perfeita para amplificar sua experiência musical. Com design moderno e compacto, ela pode ser facilmente transportada para qualquer lugar. Com potência e clareza sonora, você desfrutará de graves profundos e agudos nítidos. A caixa de som é compatível com dispositivos Bluetooth, permitindo que você reproduz', '459.99', '../images/7.png', 0, 0, 'sound box'),
(8, 'MOUSE GAMER REDRAGON PEGASUS RGB 7200DPI, M705', 'O Mouse Gamer é um acessório essencial para jogadores que buscam precisão e desempenho nos seus jogos. Com design ergonômico e botões programáveis, ele se adapta perfeitamente à sua mão, proporcionando conforto durante longas sessões de jogo. Possui sensor de alta precisão, permitindo movimentos suaves e responsivos.', '100.00', '../images/8.png', 0, 0, 'mouse'),
(9, 'MOUSE THERMALTAKE TT ESPORTS VENTUS Z 11000DPI RGB, MO-VEZ-WDLOBK-01', 'O Mouse Gamer é um acessório essencial para jogadores que buscam precisão e desempenho nos seus jogos. Com design ergonômico e botões programáveis, ele se adapta perfeitamente à sua mão, proporcionando conforto durante longas sessões de jogo. Possui sensor de alta precisão, permitindo movimentos suaves e responsivos.', '479.50', '../images/9.png', 0, 0, 'mouse'),
(10, 'TECLADO MAGNETICO GAMER REDRAGON KUMARA PRO, RGB, SWITCH VERMELHO, PRETO, K552RGB-PRO-PT-RED', 'Com um design ergonômico e teclas de resposta rápida, proporciona conforto e precisão durante a digitação ou jogabilidade. Seu layout completo e retroiluminação personalizável permitem uma experiência de uso personalizada, além de facilitar a visualização em ambientes com pouca luz.', '379.00', '../images/10.png', 0, 0, 'keyboard'),
(11, 'TECLADO REDRAGON DEVARAJAS BARBONE EDITION, RGB, PRETO, RD-BBK556', 'Com um design ergonômico e teclas de resposta rápida, proporciona conforto e precisão durante a digitação ou jogabilidade. Seu layout completo e retroiluminação personalizável permitem uma experiência de uso personalizada, além de facilitar a visualização em ambientes com pouca luz.', '400.00', '../images/11.png', 0, 0, 'keyboard'),
(12, 'HEADSET GAMER REDRAGON LULUCA, RGB, DRIVERS 50MM, AZUL E CINZA, L260RGB', 'O Headset Gamer é perfeito para mergulhar em uma experiência sonora imersiva durante os seus jogos. Com drivers de alta qualidade, ele proporciona áudio nítido e envolvente, permitindo que você ouça todos os detalhes do jogo.', '223.41', '../images/18.png', 0, 0, 'headset'),
(13, 'HEADSET GAMER HYPERX CLOUD II PRETO/VERMELHO, KHX-HSCP-RD', 'O Headset Gamer é perfeito para mergulhar em uma experiência sonora imersiva durante os seus jogos. Com drivers de alta qualidade, ele proporciona áudio nítido e envolvente, permitindo que você ouça todos os detalhes do jogo.', '400.00', '../images/13.png', 0, 0, 'headset'),
(14, 'HEADSET GAMER RAZER KRAKEN X LITE, SOM SURROUND 7.1, DRIVERS 40MM, PRETO, RZ04-02950100-R3U1', 'O Headset Gamer é perfeito para mergulhar em uma experiência sonora imersiva durante os seus jogos. Com drivers de alta qualidade, ele proporciona áudio nítido e envolvente, permitindo que você ouça todos os detalhes do jogo.', '235.18', '../images/14.png', 0, 0, 'headset'),
(15, 'HEADSET GAMER REDRAGON BRANCOALA, RGB, DRIVERS 50MM, PRETO E AMARELO, B260RGB', 'O Headset Gamer é perfeito para mergulhar em uma experiência sonora imersiva durante os seus jogos. Com drivers de alta qualidade, ele proporciona áudio nítido e envolvente, permitindo que você ouça todos os detalhes do jogo.', '199.40', '../images/15.png', 0, 0, 'headset'),
(16, 'HEADSET GAMER RAZER KRAKEN X LITE, SOM SURROUND 7.1, DRIVERS 40MM, PRETO, RZ04-02950100-R3U1', 'O Headset Gamer é perfeito para mergulhar em uma experiência sonora imersiva durante os seus jogos. Com drivers de alta qualidade, ele proporciona áudio nítido e envolvente, permitindo que você ouça todos os detalhes do jogo.', '230.00', '../images/16.png', 0, 0, 'headset'),
(17, 'CAIXA DE SOM JBL R19BT, 4W RMS 2X2W, BLUETOOTH, USB, AUX, PRETO, R19BT-BK', 'A caixa de som oferece um som de alta qualidade e é perfeita para amplificar sua experiência musical.                        Com design moderno e compacto, ela pode ser facilmente transportada para qualquer lugar. Com potência e clareza sonora, você desfrutará de graves profundos e agudos nítidos. \r\n', '329.99', '../images/17.png', 0, 0, 'sound box'),
(18, 'HEADSET GAMER REDRAGON, RGB, DRIVERS 50MM, AZUL E CINZA, L260RGB', 'O Headset Gamer é perfeito para mergulhar em uma experiência sonora imersiva durante os seus jogos. Com drivers de alta qualidade, ele proporciona áudio nítido e envolvente, permitindo que você ouça todos os detalhes do jogo.', '211.75', '../images/18.png', 0, 0, 'headset'),
(19, 'COMPUTADOR GAMER, INTEL I7-11400, GEFORCE RTX 3060 8GB, 16GB DDR4, SSD 480GB', 'Este PC possui capacidade suficiente para rodar a maioria dos jogos da atualidade. Com o processador I5-4000, e a GTX 1050 4 GB, os jogos como GTA V, Fortnite, League of Legends, Rocket League, terão a grande performance de 60 FPS constante.', '4649.98', '../images/19.png', 0, 0, 'pc'),
(20, 'COMPUTADOR GAMER, INTEL I5-11400, GEFORCE RTX 3060 4GB, 16GB DDR4, SSD 480GB', 'Este PC possui capacidade suficiente para rodar a maioria dos jogos da atualidade. Com o processador I5-4000, e a GTX 1050 4 GB, os jogos como GTA V, Fortnite, League of Legends, Rocket League, terão a grande performance de 60 FPS constante.', '4540.87', '../images/2.png', 0, 0, 'pc'),
(21, 'INTEL CORE I5-10400F, 6-CORE, 12-THREADS, 2.9GHZ (4.3GHZ TURBO), CACHE 12MB, LGA1200', 'Não possui vídeo integrado.\nTecnologias: 	\nTecnologia Intel® Turbo Boost 2.0\nTecnologia Intel® Hyper-Threading\nTecnologia de virtualização Intel® (VT-x)\nTecnologia de virtualização Intel® para E / S direcionada (VT-d)\nIntel® VT-x com tabelas de páginas estendidas (EPT)\nIntel® 64\nConjunto de instruções de 64 bits\nExtensões do conjunto de instruções I', '619.99', '../images/20.png', 0, 0, 'processor'),
(22, 'AMD Ryzen 5 5600G, 3.9GHz (4.4GHz Max Turbo), AM4, Vídeo Integrado, 6 Núcleos', 'Processador AMD Ryzen 5 5600G 3.9 até 4.4GHZ 19MB AM4 Wraith Stealth Radeon - PN:100-100000252BOX\r\nUm produto de verdadeiro desempenho', '824.00', '../images/21.png', 0, 0, 'processor'),
(23, 'Processador AMD Ryzen 7 5700X, 3.4GHz (4.6GHz Max Turbo), Cache 36MB, AM4', 'Com a avançada arquitetura “Zen 3” dos processadores AMD Ryzen Série 5000 G, você tem o desempenho de computação que os jogos imersivos exigem. A tecnologia de 7 nm é um design com alta performance e alta eficiência extraordinários, além das possibilidades poderosas de thread único ou múltiplo. Assim, você tem frames rápidos para uma melhor experiência nos j', '1248.99', '../images/22.png', 0, 0, 'processor'),
(24, 'Monitor Gamer LG 26 IPS, Ultra Wide, 75Hz, Full HD, 1ms, FreeSync Premium, HDR 10, 99% sRGB, HDMI, V', 'Multitarefa sem minimizar: Mantenha tudo em uma tela com a marca de monitores UltraWide nº 1 nos EUA por 4 anos consecutivos*.\r\nVeja mais e faça mais nesta tela UltraWide™ Full HD (2560x1080). Com 33% a mais de espaço na tela em largura do que a tela de resolução FHD (1920x1080), você pode realizar várias tarefas com eficiência, sem alternar entre os program', '699.99', '../images/23.png', 0, 0, 'monitor'),
(25, 'Monitor Gamer Samsung 22\" FHD,75Hz, HDMI, VGA, Freesync, Preto, Série T350', 'Eco Saving Plus, Eye Saver Mode, Flicker Free, Game mode, Image Size, FreeSync, Off Timer Plus\r\nFHD,75Hz, HDMI, VGA, Freesync, Preto, Série T350', '599.90', '../images/24.png', 0, 0, 'monitor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reviews`
--

CREATE TABLE `reviews` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rating` varchar(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `question1` varchar(17) NOT NULL,
  `question2` varchar(3) NOT NULL,
  `question3` varchar(20) NOT NULL,
  `question4` varchar(3) NOT NULL,
  `question5` varchar(16) NOT NULL,
  `question6` varchar(16) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `name`, `rating`, `title`, `description`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `date`) VALUES
(45, 3, 3, 'Pedro Augusto Moreira de Oliveira', 'like', 'O computador é perfeito!', 'O desempenho deste computador é muito bom, não travando em nenhum jogo testado. Não há pontos negativos em minha opinião.', 'Gamer', 'Sim', 'Desempenho ótimo', 'Sim', 'Sim', 'Sim', '2023-10-24'),
(47, 2, 14, 'Pedro Clovis', 'deslike', 'Eu não gostei deste computador!', 'Eu não gostei do fato de que o computador possui apenas 8 GB de RAM. Também achei péssimo ter apenas 240 GB de SSD, pois não consigo baixar todos os jogos que eu quero.', 'Gamer', 'Não', 'Desempenho aceitável', 'Sim', 'Sim', 'Sim', '2023-10-24'),
(50, 5, 14, 'Pedro Clovis', 'like', 'Gostei da caixa de som!', 'O som dela é perfeito, além de funcionar bluetooth ou a cabo.', '', '', '', '', '', '', '2023-10-24'),
(54, 1, 3, 'Pedro Augusto Moreira de Oliveira', 'like', 'Eu gostei deste computador!', 'O desempenho deste computador é sensacional, rodou todos os jogos que eu testei com bastante fluidez. Único ponto negativo foi o baixo armazenamento de 240 GB, que limita a instalação de diversos programas e jogos.', 'Gamer', 'Não', 'Desempenho ótimo', 'Sim', 'Sim', 'Sim', '2023-10-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`) VALUES
(3, 'Pedro Augusto Moreira de Oliveira', 'pedro@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'Pedro Clovis', 'pedropedoro1@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(15, 'teste', 'teste@hotmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `order`
--
ALTER TABLE `order`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
