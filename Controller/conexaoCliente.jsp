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
        <title>Lio Magazine - Cliente Confirma</title>
    </head>
    <body>
        <%
            // Variaveis finais do HTML
            String cliente = request.getParameter("cliente");
            String email = request.getParameter("email");
            String telefone = request.getParameter("telefone");
           
            // Obj Cliente
            Cliente cli = new Cliente(cliente, email, telefone);
            
            try {
            //Conexão com Banco de dados
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexao = DriverManager.getConnection("jdbc:mysql://localhost:3306/liomagazine", "root", "");

            // cria um preparedStatement
                String sql = "insert into cliente (cliente, email, telefone) values (?,?,?)";
                PreparedStatement stmt = conexao.prepareStatement(sql);

            //preenche os valores            
                stmt.setString(1, cli.getCliente());
                stmt.setString(2, cli.getEmail());
                stmt.setString(3, cli.getTelefone());
                
            // executa
                stmt.execute();
                stmt.close();
                conexao.close();
                response.sendRedirect("inicio.html"); 
                
            } catch (SQLException e) {
                out.println("Erro " + e);
              }



        %>
        
        <form action="conexao.jsp">
            <input type="submit" value="Confirmar">
        </form>
        
    </body>
</html>