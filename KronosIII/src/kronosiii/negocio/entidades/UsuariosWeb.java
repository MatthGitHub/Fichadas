/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "USUARIOS_WEB")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "UsuariosWeb.findAll", query = "SELECT u FROM UsuariosWeb u"),
    @NamedQuery(name = "UsuariosWeb.findByIdUsuario", query = "SELECT u FROM UsuariosWeb u WHERE u.idUsuario = :idUsuario"),
    @NamedQuery(name = "UsuariosWeb.findByNombreUsuario", query = "SELECT u FROM UsuariosWeb u WHERE u.nombreUsuario = :nombreUsuario"),
    @NamedQuery(name = "UsuariosWeb.findByClave", query = "SELECT u FROM UsuariosWeb u WHERE u.clave = :clave"),
    @NamedQuery(name = "UsuariosWeb.findByActivo", query = "SELECT u FROM UsuariosWeb u WHERE u.activo = :activo"),
    @NamedQuery(name = "UsuariosWeb.findByIdExtreme", query = "SELECT u FROM UsuariosWeb u WHERE u.idExtreme = :idExtreme")})
public class UsuariosWeb implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "idUsuario")
    private Integer idUsuario;
    @Column(name = "nombre_usuario")
    private String nombreUsuario;
    @Column(name = "clave")
    private String clave;
    @Column(name = "activo")
    private Boolean activo;
    @Column(name = "idExtreme")
    private String idExtreme;
    @JoinColumn(name = "idEmpleado", referencedColumnName = "IdEmpleado")
    @ManyToOne
    private Empleados idEmpleado;
    @JoinColumn(name = "fk_rol", referencedColumnName = "idRol")
    @ManyToOne
    private Roles fkRol;

    public UsuariosWeb() {
    }

    public UsuariosWeb(Integer idUsuario) {
        this.idUsuario = idUsuario;
    }

    public Integer getIdUsuario() {
        return idUsuario;
    }

    public void setIdUsuario(Integer idUsuario) {
        this.idUsuario = idUsuario;
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

    public Boolean getActivo() {
        return activo;
    }

    public void setActivo(Boolean activo) {
        this.activo = activo;
    }

    public String getIdExtreme() {
        return idExtreme;
    }

    public void setIdExtreme(String idExtreme) {
        this.idExtreme = idExtreme;
    }

    public Empleados getIdEmpleado() {
        return idEmpleado;
    }

    public void setIdEmpleado(Empleados idEmpleado) {
        this.idEmpleado = idEmpleado;
    }

    public Roles getFkRol() {
        return fkRol;
    }

    public void setFkRol(Roles fkRol) {
        this.fkRol = fkRol;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idUsuario != null ? idUsuario.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof UsuariosWeb)) {
            return false;
        }
        UsuariosWeb other = (UsuariosWeb) object;
        if ((this.idUsuario == null && other.idUsuario != null) || (this.idUsuario != null && !this.idUsuario.equals(other.idUsuario))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.UsuariosWeb[ idUsuario=" + idUsuario + " ]";
    }
    
}
