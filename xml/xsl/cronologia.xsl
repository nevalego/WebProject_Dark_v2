<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html>
            <head>
                <meta name="author" content="Nerea Valdés Egocheaga"/>
                <meta name="description"
                      content="Proyecto Estrenos - Junio Software y Estándares para la Web"/>
                <meta name="keywords" content="SEW,Estrenos,Junio,Software,Estándares,Web"/>
                <title>Cronologia Proyecto Dark - Junio Software y Estándares para la Web</title>
                <link rel="stylesheet" type="text/css" href="../css/style.css"/>
            </head>
            <body>
                <header>
                    <h1>Dark</h1>
                </header>
                <main>
                    <xsl:for-each select="temporadas/temporada">
                        <h2>Temporada
                            <xsl:value-of select="@t"/>
                        </h2>

                        <xsl:for-each select="episodios/episodio">
                            <h3>Episodio
                                <xsl:value-of select="@ep"/> :
                                <xsl:value-of select="@titulo"/>
                                (<xsl:value-of select="duracion"/>)
                            </h3>
                            <section>
                                <xsl:value-of select="resumen"/>

                            </section>
                            <xsl:for-each select="sucesos/suceso">
                                <h4>Suceso :
                                    <xsl:value-of select="descripcion"/>
                                </h4>
                                <section>
                                    <p>Año
                                        <xsl:value-of select="año"/>,
                                        <xsl:value-of select="lugar"/>
                                    </p>
                                    <p>Personajes implicados:</p>
                                    <ul>
                                        <xsl:for-each select="personajes/personaje">
                                            <li><xsl:value-of select="familia"/>,
                                                <xsl:value-of select="nombre"/> de
                                                <xsl:value-of select="edad"/> años.
                                                <xsl:value-of select="contexto"/>
                                            </li>
                                        </xsl:for-each>
                                    </ul>
                                </section>
                            </xsl:for-each>
                        </xsl:for-each>
                    </xsl:for-each>
                </main>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>