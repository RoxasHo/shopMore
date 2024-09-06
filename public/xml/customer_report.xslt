
<!-- TMY -->
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Customer Report</title>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>CID</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>Description</th>
                        <th>CSPID</th>
                        <th>Rating</th>
                    </tr>
                    <xsl:for-each select="customer_report/report">
                    
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="CID"/></td>
                            <td><xsl:value-of select="created_at"/></td>
                            <td><xsl:value-of select="updated_at"/></td>
                            <td><xsl:value-of select="Description"/></td>
                            <td><xsl:value-of select="CSPID"/></td>
                            <td><xsl:value-of select="Rating"/></td>
                           
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

