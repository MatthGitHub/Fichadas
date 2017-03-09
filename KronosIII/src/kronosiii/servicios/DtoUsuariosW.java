/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.servicios;

import kronosiii.negocio.entidades.Empleados;
import kronosiii.negocio.entidades.Roles;
import kronosiii.negocio.entidades.UsuariosWeb;

/**
 *
 * @author Administrador
 */
public class DtoUsuariosW {
    private String nombreUsuario;
    private String clave;
    private String legajo;
    private Empleados idEmpleado;
    private Boolean activo;
    private Roles fkRol;
    private Integer idExtreme;

    public DtoUsuariosW(){
        
    }    
    
    public DtoUsuariosW cargarDto(UsuariosWeb aCargar){
        this.setActivo(aCargar.getActivo());
        this.setClave(aCargar.getClave());
        this.setFkRol(aCargar.getFkRol());
        this.setIdEmpleado(aCargar.getIdEmpleado());
        this.setNombreUsuario(aCargar.getNombreUsuario());
        return this;
    }
    
    public String getNombreUsuario() {
        return nombreUsuario;
    }

    public void setNombreUsuario(String nombreUsuario) {
        this.nombreUsuario = nombreUsuario;
    }

    public String getClave() {
        return clave;
    }

    public void setClave(String clave) {
        this.clave = clave;
    }

    public Empleados getIdEmpleado() {
        return idEmpleado;
    }

    public void setIdEmpleado(Empleados idEmpleado) {
        this.idEmpleado = idEmpleado;
    }

    public Boolean getActivo() {
        return activo;
    }

    public void setActivo(Boolean activo) {
        this.activo = activo;
    }

    public Roles getFkRol() {
        return fkRol;
    }

    public void setFkRol(Roles fkRol) {
        this.fkRol = fkRol;
    }

    public Integer getIdExtreme() {
        return idExtreme;
    }

    public void setIdExtreme(Integer idExtreme) {
        this.idExtreme = idExtreme;
    }
    
    
    
}
