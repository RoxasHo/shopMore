<!-- JOEY -->
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Product List</title>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Date</th>
                    </tr>
                    <xsl:for-each select="products/product">
                    <xsl:variable name="imageName" select="image" />

                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><img src="{concat('../assets/imgs/products/', $imageName)}" alt="Product Image"  width="60"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="stock"/></td>
                            <td><xsl:value-of select="price"/></td>
                            <td><xsl:value-of select="category"/></td>
                            <td><xsl:value-of select="date"/></td>
                           
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
