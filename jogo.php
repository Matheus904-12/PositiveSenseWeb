<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/partials.php';

// Configurações do site
$site_config = [
    'title' => 'Jogos - PositiveSense',
    'description' => 'Jogos educativos para desenvolvimento',
    'year' => date('Y')
];

// Dados da navegação
$nav_items = [
    ['url' => 'inicial.php', 'label' => 'Início'],
    ['url' => 'sobre.php', 'label' => 'Sobre'],
    ['url' => 'trabalho.php', 'label' => 'Nosso Trabalho'],
    ['url' => 'videos.php', 'label' => 'Vídeos'],
    ['url' => 'login.php', 'label' => 'Conta']
];

// Dados dos jogos (estáticos)
$jogos = [
    [
        'title' => 'Jogo da Memória',
        'description' => 'Teste sua memória',
        'icon' => 'fa-brain',
        'color' => '#5B8FC4',
        'url' => 'jogo-memoria.php'
    ],
    [
        'title' => 'Jogo da Velha',
        'description' => 'Clássico jogo de estratégia',
        'icon' => 'fa-hashtag',
        'color' => '#5B8FC4',
        'url' => 'jogodavelha.php'
    ],
    [
        'title' => 'Sequência',
        'description' => 'Complete os padrões lógicos',
        'icon' => 'fa-list-ol',
        'color' => '#5B8FC4',
        'url' => 'jogodasequencia.php'
    ],
    [
        'title' => 'Caça Palavras',
        'description' => 'Encontre palavras escondidas',
        'icon' => 'fa-spell-check',
        'color' => '#5B8FC4',
        'url' => 'cacapalavras.php'
    ],
    [
        'title' => 'Fruit Ninja',
        'description' => 'Corte frutas com agilidade',
        'icon' => 'fa-apple-whole',
        'color' => '#5B8FC4',
        'url' => 'fruitninja.php'
    ],
    [
        'title' => 'Quebra-Cabeça',
        'description' => 'Monte a imagem completa',
        'icon' => 'fa-puzzle-piece',
        'color' => '#5B8FC4',
        'url' => 'quebracabeca.php'
    ]
];

// Observação: a funcionalidade de ranking/"participa_ranking" foi removida conforme solicitado.
// Mantemos apenas a lista estática de jogos para exibição.

// Variável de compatibilidade (não usada atualmente)
$jogo_id = null;

$footer_links = [
    'Navegação' => [
        ['label' => 'Início', 'url' => 'inicial.php'],
        ['label' => 'Sobre', 'url' => 'sobre.php'],
        ['label' => 'Jogos', 'url' => 'jogo.php']
    ],
    'Suporte' => [
        ['label' => 'Ajuda', 'url' => '#'],
        ['label' => 'Contato', 'url' => '#']
    ]
];

$social_media = [
    ['icon' => 'fab fa-whatsapp', 'url' => 'https://wa.me/5511999999999', 'title' => 'WhatsApp'],
    ['icon' => 'fas fa-envelope', 'url' => 'mailto:positivesense@gmail.com', 'title' => 'Email']
];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos - PositiveSense</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .games-section {
            padding: 120px 0 4rem;
            background: var(--bg-secondary);
            min-height: calc(100vh - 80px);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .games-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .games-header {
            text-align: center;
            margin-bottom: 4rem;
            padding-top: 2rem;
            width: 100%;
        }

        .games-header h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
            font-weight: 800;
        }

        .games-header p {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 700px;
            margin: 0 auto;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(3, 380px) !important;
            gap: 2.5rem;
            justify-content: center;
            justify-items: center;
        }

        .game-card {
            background: var(--bg-primary);
            border-radius: var(--radius-lg);
            padding: 2.5rem;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            box-shadow: var(--shadow-md);
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
            height: 420px !important;
            width: 380px !important;
            box-sizing: border-box;
        }

        .game-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--card-color);
            transition: width 0.3s ease;
        }

        /* Hover visual unificado: usar sempre #5B8FC4 ao passar o mouse */
        .game-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: #5B8FC4;
            /* cor unificada no hover */
        }

        .game-card:hover::before {
            width: 100%;
            background: #5B8FC4;
            opacity: 0.05;
        }

        .game-card-icon {
            font-size: 4rem;
            color: var(--card-color);
            transition: transform 0.3s ease, color 0.2s ease;
            margin-bottom: 0.5rem;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* No hover, o ícone pode manter a cor do card; ao passar o mouse, troca para a cor unificada */
        .game-card:hover .game-card-icon {
            transform: scale(1.1) rotate(5deg);
            color: #5B8FC4;
        }

        .game-card h3 {
            color: var(--text-primary);
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-shrink: 0;
        }

        .game-card p {
            color: var(--text-secondary);
            margin: 0;
            line-height: 1.6;
            font-size: 1rem;
            flex: 1;
            height: 80px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .play-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            font-size: 1.05rem;
            margin-top: auto;
            padding: 0.85rem 1.75rem;
            background: var(--card-color);
            color: white;
            border-radius: var(--radius-md);
            justify-content: center;
            transition: all 0.3s ease, background 0.2s ease;
            height: 52px;
            flex-shrink: 0;
        }

        /* Botão 'Jogar' também usa cor unificada no hover */
        .game-card:hover .play-btn {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            background: #5B8FC4;
        }

        @media (max-width: 768px) {
            .games-section {
                padding: 100px 1.5rem 3rem;
            }

            .games-header h1 {
                font-size: 2rem;
            }

            .games-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .games-section {
                padding: 90px 1rem 2rem;
            }

            .games-header h1 {
                font-size: 1.75rem;
            }

            .games-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .game-card {
                padding: 1.5rem;
            }

            .game-card-icon {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <?php render_header($nav_items); ?>

    <section class="games-section" style="padding-top: 140px;">
        <div class="games-header">
            <h1>Central de Jogos</h1>
            <p>Escolha um jogo e divirta-se aprendendo!</p>
        </div>
        <div class="games-container">
            <div class="games-grid">
                <?php foreach ($jogos as $jogo): ?>
                    <?php
                    // Determina o slug a partir da URL do jogo
                    $slug = pathinfo($jogo['url'], PATHINFO_FILENAME);

                    // Mapa explícito: prefira arquivos específicos que foram adicionados na pasta img/games
                    $explicit_image_map = [
                        'jogo-memoria' => 'img/games/jogomemoria.jpeg',
                        'jogodavelha' => 'img/games/jogodavelha.jpeg',
                        'jogodasequencia' => 'img/games/sequencia.jpeg',
                        'cacapalavras' => 'img/games/caçapalavras.jpeg',
                        'fruitninja' => 'img/games/frutninja.jpeg',
                        'quebracabeca' => 'img/games/quebracabeca.jpeg'
                    ];

                    // Função utilitária: gera variações do slug (ex: remove hífens, substitui por _ e versão ASCII sem acentos)
                    $generate_slug_variants = function ($s) {
                        $variants = [];
                        $variants[] = $s;
                        $variants[] = str_replace('-', '', $s);
                        $variants[] = str_replace('-', '_', $s);
                        // Versão ASCII sem acentos (se disponível)
                        $ascii = @iconv('UTF-8', 'ASCII//TRANSLIT', $s);
                        if ($ascii && $ascii !== $s) {
                            $variants[] = $ascii;
                            $variants[] = str_replace('-', '', $ascii);
                            $variants[] = str_replace('-', '_', $ascii);
                        }
                        // Normaliza e retorna únicos
                        $variants = array_map('trim', $variants);
                        $variants = array_values(array_unique($variants));
                        return $variants;
                    };

                    // Primeiro tenta usar o mapa explícito (se o arquivo existir)
                    $img_path = 'img/mascote.gif'; // fallback
                    if (isset($explicit_image_map[$slug]) && file_exists(__DIR__ . '/' . $explicit_image_map[$slug])) {
                        $img_path = $explicit_image_map[$slug];
                    } else {
                        // Procurar imagens preferindo: .jpeg, .jpg, .png, .svg (em várias variações do slug)
                        $dir = __DIR__ . '/img/games/';
                        $exts = ['.jpeg', '.jpg', '.png', '.svg'];
                        $variants = $generate_slug_variants($slug);
                        foreach ($variants as $v) {
                            foreach ($exts as $ext) {
                                $candidate = $dir . $v . $ext;
                                if (file_exists($candidate)) {
                                    $img_path = 'img/games/' . $v . $ext;
                                    break 2;
                                }
                            }
                        }
                    }
                    ?>

                    <a href="<?php echo htmlspecialchars($jogo['url']); ?>"
                        class="game-card"
                        data-image="<?php echo htmlspecialchars($img_path); ?>"
                        style="--card-color: <?php echo htmlspecialchars($jogo['color']); ?>;">
                        <div class="game-card-icon">
                            <i class="fas <?php echo htmlspecialchars($jogo['icon']); ?>"></i>
                        </div>
                        <h3><?php echo htmlspecialchars($jogo['title']); ?></h3>
                        <p><?php echo htmlspecialchars($jogo['description']); ?></p>
                        <span class="play-btn">
                            <i class="fas fa-play"></i> Jogar Agora
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php render_footer($footer_links, $social_media, $site_config['year']); ?>

</body>

</html>
