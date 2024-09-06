<!-- HKH -->
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>User List</title>
            </head>
            <body>
                <table border="1">
                    <tr>
                        <th>UID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>EmailVerifiedAt</th>
                        <th>Password</th>
                        <th>UType</th>
                        <th>RememberToken</th>
                        <th>CreatedAt</th>
                        <th>UpdatedAt</th>
                    </tr>
                    <xsl:for-each select="users/user">
                    <xsl:variable name="userData" select="id" />
                        <tr>
                            <td><xsl:value-of select="id"/></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="email"/></td>
                            <td><xsl:value-of select="email_verified_at"/></td>
                            <td><xsl:value-of select="password"/></td>
                            <td><xsl:value-of select="utype"/></td>
                            <td><xsl:value-of select="remember_token"/></td>
                            <td><xsl:value-of select="created_at"/></td>
                            <td><xsl:value-of select="updated_at"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
