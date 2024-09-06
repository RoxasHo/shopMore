<!-- TMY -->
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>FAQ</title>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>CSPID</th>
                    </tr>
                    <xsl:for-each select="faq/faqxml">
                    
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="Question"/></td>
                            <td><xsl:value-of select="Answer"/></td>
                            <td><xsl:value-of select="created_at"/></td>
                            <td><xsl:value-of select="updated_at"/></td>
                            <td><xsl:value-of select="CSPID"/></td>
                            
                           
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>


