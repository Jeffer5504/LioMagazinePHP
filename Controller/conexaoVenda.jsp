<%@page import="javax.swing.JOptionPane"%>
<%@page import="java.lang.String"%>
<%@page import="java.util.Date"%>
<%@page import="java.text.SimpleDateFormat"%>
<%@page import="java.text.DateFormat"%>
<%@page import="br.com.liomagazine.Venda"%>
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
        <title>Lio Magazine - Venda Confirma</title>
    </head>
    <body>
        <%
            // Variaveis para converter
            String stringQuantidade = request.getParameter("quantidade");
            String stringDesconto = request.getParameter("desconto");
            
            // Desconto vazio
            if (stringDesconto == ""){
                stringDesconto = "0";
            }
            
            // Variaveis finais do HTML
            String email = request.getParameter("email");
            String produto = request.getParameter("produto");
            String obs = request.getParameter("obs");
            String data = request.getParameter("data");
                
            // Convertidas
            int quantidade = Integer.parseInt(stringQuantidade);
            float desconto = Float.parseFloat(stringDesconto);
            
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
            
            // Obs vazia
            if (obs == ""){
                obs = "Sem observações.";
            }
            
            // Obj Venda
            Venda v=new Venda(email, produto, desconto, quantidade, obs, data);
            
               try{
            // Conexão com Banco de dados
                Class.forName("com.mysql.jdbc.Driver");
                Connection conexao = DriverManager.getConnection("jdbc:mysql://localhost:3306/liomagazine", "root", "");

            // Busca Cliente
                String buscaCliente = "SELECT idCliente FROM cliente WHERE email LIKE '"+email+"'";
                
                PreparedStatement stmtCli = conexao.prepareStatement(buscaCliente);
                ResultSet rs = stmtCli.executeQuery();
                
                
                if(!rs.next()){
                   response.sendRedirect("cadastroVenda.html");
                }
                
                while (rs.next()) {
                    int idCliente = rs.getInt("idCliente");
                    v.setIdCliente(idCliente);
                }
                
            // Busca Produto
                String buscaProduto = "SELECT idProduto,quantidade,subtotal FROM produto WHERE nome LIKE '"+produto+"'";
                
                PreparedStatement stmtPro = conexao.prepareStatement(buscaProduto);
                
                
                ResultSet rs2 = stmtPro.executeQuery();
                if(!rs.next()){
                   response.sendRedirect("inicio.html");
                }
                while (rs2.next()) {
                    int dbidProduto = rs2.getInt("idProduto");
                    v.setIdProduto(dbidProduto);
                    int dbquantidade = rs2.getInt("quantidade");
                    v.setDbQuantidade(dbquantidade);
                    float dbsubtotal = rs2.getInt("subtotal");
                    v.setDbSubtotal(dbsubtotal);
                }
                
                v.setSubtotal();
                v.setTotal();
                
            // cria um preparedStatement
                String sql = "insert into venda (idCliente, idProduto, desconto, quantidade, subtotal, total, obs, data) values (?,?,?,?,?,?,?,?)";
                PreparedStatement stmt = conexao.prepareStatement(sql);

            //preenche os valores            
                stmt.setInt(1, v.getIdCliente());
                stmt.setInt(2, v.getIdProduto());
                stmt.setFloat(3, v.getDesconto());
                stmt.setInt(4, v.getQuantidade());
                stmt.setFloat(5, v.getSubtotal());
                stmt.setFloat(6, v.getTotal());
                stmt.setString(7, v.getObs());
                stmt.setString(8, v.getData());
                
            // executa
                stmt.execute();
                stmt.close();
                
            // cria um preparedStatement
                //String sql2 = "insert into produto (quantidade) values (?)";
                String sql2 ="update produto set quantidade='"+v.getDbQuantidade()+"' where nome='"+v.getProduto()+"'";
                PreparedStatement stmt2 = conexao.prepareStatement(sql2);

            // executa
                stmt2.execute();
                stmt2.close();
                
                conexao.close();
                 
               
            } catch (SQLException e) {
                out.println("Erro " + e);
              }
        %>
        
    </body>
</html>