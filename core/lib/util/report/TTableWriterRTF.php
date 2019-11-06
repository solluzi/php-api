<?php
declare (strict_types = 1);
namespace Report;

/**
 * Escreve tabelas no formato RTF
 */
class TTableWriter implements ITableWriter
{
    private $rtf;
    private $styles;
    private $table;
    private $rowcounter;
    private $colcounter;
    private $widths;

    /**
     * método construtor
     * @param $widths vetor contendo as larguras das colunas
     */
    public function __construct($widths)
    {
        // armazena as larguras
        $this->widths = $widths;

        // inicializa atributos
        $this->styles     = [];
        $this->rowcounter = 0;

        // instancia a classe PHPRtfLite;
        $this->rtf = new \PHPRtfLite();
        $this->rtf->setMargins(2, 2, 2, 2);

        // acrecenta uma seção ao documento
        $section = $this->rtf->addSection();

        //acrecenta uma tabela à seção
        $this->table = $section->addTable();

        // acrecenta as colunas à tabela
        foreach ($widths as $columnwidth) {
            $this->table->addColumn($columnwidth / 28);
        }
    }

    /**
     * Adiciona um novo estilo
     * @param @stylename nome do estilo
     * @param @fontface nome da fonte
     * @param @fontsize tamanho da fonte
     * @param @fontstyle estilo da fonte (B=bold, I=italic)
     * @param @fontcolor cor da fonte
     * @param @fillcolor cor de preenchimento
     *
     */
    public function addStyle($stylename, $fontface, $fontsize, $fontstyle, $fontcolor, $fillcolor)
    {
        // instancia um objeto para estilo de fonte(PHPRftLite_Font)
        $font = new \PHPRtfLite_Font($fontsize, $fontface, $fontcolor);
        $font->setBold(strstr($fontstyle, 'B'));
        $font->setItalic(strstr($fontstyle, 'I'));
        $font->setUnderline(strstr($fontstyle, 'U'));

        // armazena o objeto-fonte e a cor de preenchimento
        $this->styles[$stylename]['font']    = $font;
        $this->styles[$stylename]['bgcolor'] = $fillcolor;
    }

    /**
     * Adiciona uma nova linha na tabela
     */
    public function addRow()
    {
        $this->rowcounter++;
        $this->colcounter = 1;
        $this->table->addRow();
    }

    /**
     * Adiciona uma nova célula na linha atual da tabela
     * @param $content conteúdo da célula
     * @param $align alinhamento da célula
     * @param $stylename nome do estilo a ser utilizado
     * @param $colspan quantidade de células a serem mescladas
     */
    public function addCell($content, $align, $stylename = null, $colspan = 1)
    {
        //obtem a fonte e a cor do preenchimento
        $font      = $this->styles[$stylename]['font'];
        $fillcolor = $this->styles[$stylename]['bgcolor'];

        // escreve o conteúdo na célula utilizando a fonte e o alinhamento
        $this->table->writeToCell($this->rowcounter, $this->colcounter, utf8_encode($content), $font, new \PHPRtfLite_ParFormat($align));

        // define a cor de funto para a celula
        $this->table->setBackgroundForCellRange($fillcolor, $this->rowcounter, $this->colcounter, $this->rowcounter, $this->colcounter);

        if ($colspan) {
            // mescla as células caso seja necessário
            $this->table->mergeCellRange($this->rowcounter, $this->colcounter, $this->rowcounter, $this->colcounter + $colspan - 1);
        }
        $this->colcounter++;
    }

    /**
     * Armazena o conteúdo do documento em um arquivo
     * @param $filename caminho para o arquivo de saida
     */
    public function save($filename)
    {
        // instancia um objeto para estilo de borda
        $border = PHPRtfLite_Border::create(0.7, '#000000');

        // liga as bordas na tabela
        $this->table->setBorderForCellRange($border, 1, 1, $this->table->getRowsCount(), $this->table->getColumnsCount());

        // armazena o documento em um arquivo
        $this->rtf->save($filename);
        return true;
    }
}
