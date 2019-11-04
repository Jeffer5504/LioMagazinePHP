<%@page import="java.text.SimpleDateFormat"%>
<%@page import="java.util.Date"%>
<%@page import="br.com.liomagazine.Produto"%>
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
        <title>Lio Magazine - Produto Confirma</title>
    </head>
    <body>
        <%
            // Variaveis a serem convertidas
            String StringQuantidade = request.getParameter("quantidade");
            String StringPreco = request.getParameter("preco");
            String StringDesconto = request.getParameter("desconto");
            float subtotal = 0;
            
            // Desconto vazio
            if (StringDesconto == ""){
                StringDesconto = "0";
            }
            
            // Variaveis finais do HTML
            String produto = request.getParameter("produto");
            String descricao = request.getParameter("descricao");
            int quantidade = Integer.parseInt(StringQuantidade);
            float preco = Float.parseFloat(StringPreco);
            float desconto = Float.parseFloat(StringDesconto);
            String data = request.getParameter("data");
            
            // Descrição vazia
            if (descricao == ""){
                descricao = "Sem descrição.";
            }
            
            // Se data == 0
            if(data == ""){
                Date dataAtual = new Date();
                data = new SimpleDateFormat("dd/MM/yyyy").format(dataAtual);
            }else{
            // Formatar data
                SimpleDateFormat brFormat = new SimpleDateFormat("dd/MM/yyyy");
                SimpleDateFormat usFormat = new SimpleDateFormat("yyyy-MM-dd");
                data = brFormat.format(usFormat.parse(data));
            }
            
            // Obj Produto1
            Produto p1 = new Produto(produto, descricao, quantidade, preco, desconto, data);
            p1.setSubtotal(subtotal);


            try {
            //Conexão com Banco de dados
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexao = DriverManager.getConnection("jdbc:mysql://localhost:3306/liomagazine", "root", "");

            // cria um preparedStatement
                String sql = "insert into produto (nome, descricao, quantidade, preco, desconto, subtotal, data) values (?,?,?,?,?,?,?)";
                PreparedStatement stmt = conexao.prepareStatement(sql);

            //preenche os valores            
                stmt.setString(1, p1.getProduto());
                stmt.setString(2, p1.getDescricao());
                stmt.setInt(3, p1.getQuantidade());
                stmt.setFloat(4, p1.getPreco());
                stmt.setFloat(5, p1.getDesconto());
                stmt.setFloat(6, p1.getSubtotal());
                stmt.setString(7, p1.getData());
                
            // executa
                stmt.execute();
                conexao.close();
                response.sendRedirect("./inicio.html"); 
                
            } catch (SQLException e) {
                out.println("Erro " + e);
              }



        %>
        
    </body>
</html>