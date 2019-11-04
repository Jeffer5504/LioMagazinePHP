<%@page import="br.com.liomagazine.Busca"%>
<%@page import="br.com.liomagazine.Cliente"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.util.List"%>
<%@page import="java.sql.Types"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.SQLException"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Lio Magazine - Login</title>
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/config.css">
        <link rel="stylesheet" href="./css/style.css">
        <script src="js/all.js"></script>
    </head>
    <body>
        <div class="box">
            <a href="./index.html">
                <i class="fas fa-arrow-left" id="voltar"></i>
            </a>
            
       <%
            // Variaveis finais do HTML
            String usuario = request.getParameter("usuario");
            String senha = request.getParameter("senha");

            try {
                // Conexão com Banco de dados
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexao = DriverManager.getConnection("jdbc:mysql://localhost:3306/liomagazine", "root", "");
                
                // Query para selcionar os campos usuario e senha do database login
                String sql = ("SELECT * FROM login_adm WHERE usuario = '"+usuario+"'");
                PreparedStatement stmt = conexao.prepareStatement(sql);
                ResultSet rs = stmt.executeQuery();
                
                // Pegar os dados do database
                while(rs.next()){
                    String dbUsuario = rs.getString("usuario");
                    String dbSenha = rs.getString("senha");
                    
                    // Se o usuario e senha foram == aos mesmos do banco de dados 
                    if (usuario.equals(dbUsuario) && senha.equals(dbSenha)){
                        response.sendRedirect("./inicio.html"); 
                    }
                }
                response.sendRedirect("./index.html");
            }
            catch (Exception e) {
                out.println("Erro " + e);
            } 
        %>

        </div>
    </body>
</html>
