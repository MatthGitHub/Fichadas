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
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "TIPOLICENCIA")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Tipolicencia.findAll", query = "SELECT t FROM Tipolicencia t"),
    @NamedQuery(name = "Tipolicencia.findByIdTipoLicencia", query = "SELECT t FROM Tipolicencia t WHERE t.idTipoLicencia = :idTipoLicencia"),
    @NamedQuery(name = "Tipolicencia.findByDescripcion", query = "SELECT t FROM Tipolicencia t WHERE t.descripcion = :descripcion"),
    @NamedQuery(name = "Tipolicencia.findByComentario", query = "SELECT t FROM Tipolicencia t WHERE t.comentario = :comentario"),
    @NamedQuery(name = "Tipolicencia.findByMaxDiasAlA\u00f1o", query = "SELECT t FROM Tipolicencia t WHERE t.maxDiasAlA\u00f1o = :maxDiasAlA\u00f1o"),
    @NamedQuery(name = "Tipolicencia.findByMaxDiasAlMes", query = "SELECT t FROM Tipolicencia t WHERE t.maxDiasAlMes = :maxDiasAlMes"),
    @NamedQuery(name = "Tipolicencia.findByMaxDiasporLicencia", query = "SELECT t FROM Tipolicencia t WHERE t.maxDiasporLicencia = :maxDiasporLicencia"),
    @NamedQuery(name = "Tipolicencia.findByDiasHabiles", query = "SELECT t FROM Tipolicencia t WHERE t.diasHabiles = :diasHabiles"),
    @NamedQuery(name = "Tipolicencia.findByA\u00f1o", query = "SELECT t FROM Tipolicencia t WHERE t.a\u00f1o = :a\u00f1o"),
    @NamedQuery(name = "Tipolicencia.findByTipoReglamentaria", query = "SELECT t FROM Tipolicencia t WHERE t.tipoReglamentaria = :tipoReglamentaria"),
    @NamedQuery(name = "Tipolicencia.findByTipoRazonesP", query = "SELECT t FROM Tipolicencia t WHERE t.tipoRazonesP = :tipoRazonesP"),
    @NamedQuery(name = "Tipolicencia.findByBase", query = "SELECT t FROM Tipolicencia t WHERE t.base = :base"),
    @NamedQuery(name = "Tipolicencia.findByHabilitado", query = "SELECT t FROM Tipolicencia t WHERE t.habilitado = :habilitado")})
public class Tipolicencia implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdTipoLicencia")
    private Integer idTipoLicencia;
    @Column(name = "Descripcion")
    private String descripcion;
    @Column(name = "Comentario")
    private String comentario;
    @Column(name = "MaxDiasAlA\u00f1o")
    private Integer maxDiasAlAño;
    @Column(name = "MaxDiasAlMes")
    private Integer maxDiasAlMes;
    @Column(name = "MaxDiasporLicencia")
    private Integer maxDiasporLicencia;
    @Column(name = "DiasHabiles")
    private Boolean diasHabiles;
    @Column(name = "A\u00f1o")
    private Integer año;
    @Column(name = "TipoReglamentaria")
    private Integer tipoReglamentaria;
    @Column(name = "TipoRazonesP")
    private Boolean tipoRazonesP;
    @Column(name = "Base")
    private Integer base;
    @Column(name = "Habilitado")
    private Boolean habilitado;

    public Tipolicencia() {
    }

    public Tipolicencia(Integer idTipoLicencia) {
        this.idTipoLicencia = idTipoLicencia;
    }

    public Integer getIdTipoLicencia() {
        return idTipoLicencia;
    }

    public void setIdTipoLicencia(Integer idTipoLicencia) {
        this.idTipoLicencia = idTipoLicencia;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public String getComentario() {
        return comentario;
    }

    public void setComentario(String comentario) {
        this.comentario = comentario;
    }

    public Integer getMaxDiasAlAño() {
        return maxDiasAlAño;
    }

    public void setMaxDiasAlAño(Integer maxDiasAlAño) {
        this.maxDiasAlAño = maxDiasAlAño;
    }

    public Integer getMaxDiasAlMes() {
        return maxDiasAlMes;
    }

    public void setMaxDiasAlMes(Integer maxDiasAlMes) {
        this.maxDiasAlMes = maxDiasAlMes;
    }

    public Integer getMaxDiasporLicencia() {
        return maxDiasporLicencia;
    }

    public void setMaxDiasporLicencia(Integer maxDiasporLicencia) {
        this.maxDiasporLicencia = maxDiasporLicencia;
    }

    public Boolean getDiasHabiles() {
        return diasHabiles;
    }

    public void setDiasHabiles(Boolean diasHabiles) {
        this.diasHabiles = diasHabiles;
    }

    public Integer getAño() {
        return año;
    }

    public void setAño(Integer año) {
        this.año = año;
    }

    public Integer getTipoReglamentaria() {
        return tipoReglamentaria;
    }

    public void setTipoReglamentaria(Integer tipoReglamentaria) {
        this.tipoReglamentaria = tipoReglamentaria;
    }

    public Boolean getTipoRazonesP() {
        return tipoRazonesP;
    }

    public void setTipoRazonesP(Boolean tipoRazonesP) {
        this.tipoRazonesP = tipoRazonesP;
    }

    public Integer getBase() {
        return base;
    }

    public void setBase(Integer base) {
        this.base = base;
    }

    public Boolean getHabilitado() {
        return habilitado;
    }

    public void setHabilitado(Boolean habilitado) {
        this.habilitado = habilitado;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idTipoLicencia != null ? idTipoLicencia.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Tipolicencia)) {
            return false;
        }
        Tipolicencia other = (Tipolicencia) object;
        if ((this.idTipoLicencia == null && other.idTipoLicencia != null) || (this.idTipoLicencia != null && !this.idTipoLicencia.equals(other.idTipoLicencia))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Tipolicencia[ idTipoLicencia=" + idTipoLicencia + " ]";
    }
    
}
