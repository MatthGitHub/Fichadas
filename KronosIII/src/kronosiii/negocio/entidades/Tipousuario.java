/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import java.util.List;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "TIPOUSUARIO")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Tipousuario.findAll", query = "SELECT t FROM Tipousuario t"),
    @NamedQuery(name = "Tipousuario.findByIDTipoUsuario", query = "SELECT t FROM Tipousuario t WHERE t.iDTipoUsuario = :iDTipoUsuario"),
    @NamedQuery(name = "Tipousuario.findByDescripcion", query = "SELECT t FROM Tipousuario t WHERE t.descripcion = :descripcion"),
    @NamedQuery(name = "Tipousuario.findByNivelUsuario", query = "SELECT t FROM Tipousuario t WHERE t.nivelUsuario = :nivelUsuario")})
public class Tipousuario implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IDTipoUsuario")
    private Integer iDTipoUsuario;
    @Column(name = "Descripcion")
    private String descripcion;
    @Column(name = "NivelUsuario")
    private Integer nivelUsuario;
    @OneToMany(mappedBy = "iDTipoUsuario")
    private List<Usuarios> usuariosList;

    public Tipousuario() {
    }

    public Tipousuario(Integer iDTipoUsuario) {
        this.iDTipoUsuario = iDTipoUsuario;
    }

    public Integer getIDTipoUsuario() {
        return iDTipoUsuario;
    }

    public void setIDTipoUsuario(Integer iDTipoUsuario) {
        this.iDTipoUsuario = iDTipoUsuario;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Integer getNivelUsuario() {
        return nivelUsuario;
    }

    public void setNivelUsuario(Integer nivelUsuario) {
        this.nivelUsuario = nivelUsuario;
    }

    @XmlTransient
    public List<Usuarios> getUsuariosList() {
        return usuariosList;
    }

    public void setUsuariosList(List<Usuarios> usuariosList) {
        this.usuariosList = usuariosList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (iDTipoUsuario != null ? iDTipoUsuario.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Tipousuario)) {
            return false;
        }
        Tipousuario other = (Tipousuario) object;
        if ((this.iDTipoUsuario == null && other.iDTipoUsuario != null) || (this.iDTipoUsuario != null && !this.iDTipoUsuario.equals(other.iDTipoUsuario))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Tipousuario[ iDTipoUsuario=" + iDTipoUsuario + " ]";
    }
    
}
